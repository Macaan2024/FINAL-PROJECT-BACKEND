<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Grade;
use App\Models\Role;
use App\Models\Enrollment;
use Faker\Factory as Faker; // Correct import for Faker

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'unique_id',
        'lastname',
        'firstname',
        'middlename',
        'gender',
        'course',
        'year',
        'department',
        'age',
        'status',
        'email',
        'password',
        'password_confirmation'
    ];
        

    public function grade() {
        return $this->hasMany(Grade::class);
    }

    public function enrollment() {
        return $this->hasMany(Enrollment::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
