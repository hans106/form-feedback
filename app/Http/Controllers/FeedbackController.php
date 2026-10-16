<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Mail\FeedbackReceived;
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
        Mail::to(config('services.feedback.to_address'))
            ->send(new FeedbackReceived($request->validated()));

        return to_route('feedback.create')->with('success', 'Terima kasih—masukanmu sudah terkirim.');
    }
}
