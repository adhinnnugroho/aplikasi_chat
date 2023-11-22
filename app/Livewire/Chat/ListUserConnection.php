<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\ListContact;
use Illuminate\Support\Facades\Auth;

class ListUserConnection extends Component
{

    public $user;
    public $selected_contact;
    public $listeners = [
        'refreshNavbar' => '$refresh',
        'setting:profileImageUpdated' => 'setNewUser',
    ];

    public function render()
    {
        return view('livewire.chat.list-user-connection');
    }

    public function mount(){
        $this->user = ListContact::where('user_Login', '<>', Auth::user()->id)
            ->with("User")->get();
    }

    public function setNewUser(){
        $this->user = ListContact::where('user_Login', '<>', Auth::user()->id)->with("User")->get();
    }
}
