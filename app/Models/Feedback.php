<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Feedback extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'sender_name',
        'reciever_name',
        'statement'
    ];


    public function user () {
        
        return $this->belongsTo(User::class);
    }
}
