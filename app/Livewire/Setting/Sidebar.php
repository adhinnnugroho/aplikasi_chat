<?php

namespace App\Livewire\Setting;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{

    public $userLogin;
    public $listeners = [
        'refreshNavbar' => '$refresh',
        'setting:profileImageUpdated' => 'testFunction',
    ];

    public function render()
    {
        return view('livewire.setting.sidebar');
    }

    public function mount(){
        $data_userLogin = Auth::user();
        $this->userLogin = User::where(['id' => $data_userLogin->id])->first();
    }
}
