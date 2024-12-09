<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class PerformanceTask extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'quiz_score',
        'exam_score',
        'project_score',
        'assignment_score',
        'oral',
        'attendance'
    ];
}
