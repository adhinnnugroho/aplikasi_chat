<?php

namespace App\Livewire\Chats;

use App\Models\Message;
use Livewire\Component;

class HandleValueChat extends Component
{
    public $chat_id, $chat;
    public function render()
    {
        return view('livewire.chats.handle-value-chat');
    }

    public function mount(){
        $this->chat = Message::where([
            'chat_id' => $this->chat_id
        ])->get();
    }
}
