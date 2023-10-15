<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class HistoryChat extends Component
{
    public $account_data;
    public $selectedContactId;

    public function render()
    {
        return view('livewire.chat.history-chat');
    }
}
