<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Subjects;

class Grade extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'subject_id',
        'prelim',
        'midterm',
        'semifinal',
        'final',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subject() {
        return $this->belongTo(Subject::class);
    }
}
