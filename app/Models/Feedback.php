<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'performance_id',
        'student_name',
        'statement'
    ];
}
