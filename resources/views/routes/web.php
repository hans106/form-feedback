<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'create'])->name('email.feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('feedback.store');
