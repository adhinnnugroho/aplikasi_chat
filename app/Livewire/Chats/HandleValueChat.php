<?php

namespace App\Livewire\Chats;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HandleValueChat extends Component
{
    public $chat_id, $chat;
    public $user_login;

    public $listeners = [
        'sendnewmessage' => 'refreshChat',
        'savedChat' => 'savedChat',
    ];

    public function render()
    {
        return view('livewire.chats.handle-value-chat');
    }

    public function refreshChat()
    {
        $this->chat = Message::where([
            'chat_id' => $this->chat_id,
        ])->get();
    }

    public function mount()
    {
        $this->user_login = Auth::user();
        $this->chat = Message::where([
            'chat_id' => $this->chat_id,
        ])->get();
    }
}
