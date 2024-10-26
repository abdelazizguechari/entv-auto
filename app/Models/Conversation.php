<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Import the User model

class Conversation extends Model
{
    protected $fillable = ['title'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function participants()
    {
        return $this->hasMany(ConversationParticipant::class);
    }
}


