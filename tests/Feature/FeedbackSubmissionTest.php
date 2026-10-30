<?php

use App\Mail\FeedbackReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

it('shows the feedback form', function () {
    $response = $this->get(route('feedback.create'));

    $response->assertOk()
        ->assertSee('Ada yang ingin')
        ->assertSee('kamu sampaikan?')
        ->assertSee('name="message"', false);
});

it('shows a confirmation when feedback is sent successfully', function () {
    $response = $this->withSession([
        'success' => 'Terima kasih—masukanmu sudah terkirim.',
    ])->get(route('feedback.create'));

    $response->assertOk()
        ->assertSee('BERHASIL DIKIRIM')
        ->assertSee('Terima kasih—masukanmu sudah terkirim.')
        ->assertSee('Terima kasih sudah meluangkan waktu untuk berbagi.');
});

it('emails valid feedback to the configured inbox', function () {
    Mail::fake();
    config(['services.feedback.to_address' => 'inbox@example.com']);

    $response = $this->post(route('feedback.store'), [
        'name' => 'Ayu Pratama',
        'email' => 'ayu@example.com',
        'category' => 'idea',
        'sentiment' => 'great',
        'message' => 'Saya suka alur yang sederhana ini.',
    ]);

    $response->assertRedirect(route('feedback.create'))
        ->assertSessionHas('success', 'Terima kasih—masukanmu sudah terkirim.');

    $this->assertDatabaseHas('feedback', [
        'name' => 'Ayu Pratama',
        'email' => 'ayu@example.com',
        'category' => 'idea',
        'sentiment' => 'great',
        'message' => 'Saya suka alur yang sederhana ini.',
    ]);

    Mail::assertSent(FeedbackReceived::class, function (FeedbackReceived $mail): bool {
        return $mail->hasTo('inbox@example.com')
            && $mail->feedback['name'] === 'Ayu Pratama';
    });
});

it('does not send incomplete feedback', function () {
    Mail::fake();

    $response = $this->from(route('feedback.create'))
        ->post(route('feedback.store'), []);

    $response->assertRedirect(route('feedback.create'))
        ->assertSessionHasErrors([
            'name' => 'Nama perlu diisi.',
            'email' => 'Email perlu diisi.',
            'category' => 'Pilih jenis masukan terlebih dahulu.',
            'sentiment' => 'Pilih bagaimana pengalamanmu.',
            'message' => 'Ceritakan sedikit tentang masukanmu.',
        ]);

    $this->assertDatabaseCount('feedback', 0);

    Mail::assertNothingSent();
});

it('renders a branded feedback email layout', function () {
    $mail = new FeedbackReceived([
        'name' => 'Ayu Pratama',
        'email' => 'ayu@example.com',
        'category' => 'idea',
        'sentiment' => 'great',
        'message' => 'Saya suka alur yang sederhana ini.',
    ]);

    $html = $mail->render();

    expect($html)
        ->toContain('FORM FEEDBACK')
        ->toContain('Masukan baru masuk')
        ->toContain('.email-hero')
        ->toContain('background-color: #193b34')
        ->toContain('Email untuk dibalas')
        ->toContain('Ide fitur')
        ->toContain('Cerita');
});

it('escapes user supplied content in the feedback email', function () {
    $mail = new FeedbackReceived([
        'name' => '<script>alert(1)</script>',
        'email' => 'ayu@example.com',
        'category' => 'question',
        'sentiment' => 'okay',
        'message' => '<img src=x onerror=alert(1)>',
    ]);

    $html = $mail->render();

    expect($html)
        ->toContain('&lt;script&gt;')
        ->toContain('&lt;img')
        ->not->toContain('<script>alert(1)</script>')
        ->not->toContain('<img src=x onerror=alert(1)>');
});
