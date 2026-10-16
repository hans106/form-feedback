<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeedbackReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: string, category: string, sentiment: string, message: string}  $feedback
     */
    public function __construct(public readonly array $feedback) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Masukan baru dari form feedback',
            replyTo: [new Address($this->feedback['email'], $this->feedback['name'])],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.feedback',
            with: ['feedback' => $this->feedback],
        );
    }
}
