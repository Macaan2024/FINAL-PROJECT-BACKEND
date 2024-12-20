<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Enrollment;

class Subject extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'units',
        'faculty_name',
        'description',
        'subjectCode',
        'instructor',
        'room'
    ];

    public function enrollment() {
        return $this->hasMany(Enrollment::class);
    }
}
