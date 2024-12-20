<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Feedback;
use App\Models\EnrolledSubject;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'description',
    ];


    public function user() {
        return $this->hasOne(User::class);
    }
        
    public function subject() {
        return $this->hasMany(Subject::class);
    }

    public function grade() {
        return $this->hasMany(Grade::class);
    }

    public function enrolledSubject() {
        return $this->hasMany(EnrolledSubject::class);
    }
}
