<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'category', 'sentiment', 'message'])]
class Feedback extends Model
{
    protected $fillable = [
        'name',
        'email',
        'category',
        'sentiment',
        'message',
    ];
}
