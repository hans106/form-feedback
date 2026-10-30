<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Mail\FeedbackReceived;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function create(): View
    {
        return view('welcome');
    }

    public function store(StoreFeedbackRequest $request): RedirectResponse
    {
        $feedback = $request->safe()->only([
            'name',
            'email',
            'category',
            'sentiment',
            'message',
        ]);

        $feedbackCreate = Feedback::create($feedback);

        Mail::to($feedbackCreate->email)
            ->send(new FeedbackReceived($feedback));

        return to_route('feedback.create')->with('success', 'Terima kasih—masukanmu sudah terkirim.');
    }
}
