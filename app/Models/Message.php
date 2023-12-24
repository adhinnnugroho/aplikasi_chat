<?php

namespace App\Models;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Chats(){
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}
