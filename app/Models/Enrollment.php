<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Subject;

class Enrollment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'subject_id',
        'faculty_name',
        'semester',
        'schoolYear'
    ];


    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function subject() {

        return $this->belongsTo(Subject::class);
    }

}
