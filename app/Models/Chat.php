<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Messages(){
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }
}
