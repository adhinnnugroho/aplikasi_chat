<?php

namespace App\Livewire\HistoryChat;

use App\Models\User;
use Livewire\Component;

class SidebarHistoryChat extends Component
{
    public $selectedContactId, $selectedContact;
    public function render()
    {
        return view('livewire.history-chat.sidebar-history-chat');
    }

    public function mount(){
        $this->selectedContact = User::where(['id' => $this->selectedContactId])->first();
    }


}
