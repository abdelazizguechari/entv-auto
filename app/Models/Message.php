<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'file_path', 'conversation_id', 'user_id'];

    public function conversation() {
        return $this->belongsTo(Conversation::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}