<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Models\Account;
use Livewire\Component;
use App\Models\ListContact;

class HistoryChat extends Component
{
    public $account_data;
    public $selectedContactId;
    public $chatvalue;

    public function render()
    {
        return view('livewire.chat.history-chat');
    }


    public function mount(){
        $this->account_data = User::where(['id' => $this->selectedContactId])->first();

        $this->chatvalue  = null;
    }

    public function savedChat(){
        dd("test");
    }
}
