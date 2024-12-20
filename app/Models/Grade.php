<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Subjects;
use App\Models\Period;
use App\Models\Enrollment;

class Grade extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'subject_id',
        'faculty_name',
        'period_id',
        'enrollment_id',
        'grade',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subject() {
        return $this->belongTo(Subject::class);
    }
    
    public function period() {
        return $this->belongsTo(Period::class);
    }
    
    public function enrollment() {
        return $this->belongsTo(Enrollment::class);
    }

}
