<?php

namespace App\Livewire\Setting\Profile\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RemoveProfileImage extends Component
{
    use LivewireAlert;

    public $listeners = [
        'refreshNavbar' => '$refresh',
    ];

    public $profileImageUpdated = false;

    public function render()
    {
        return view('livewire.setting.profile.partials.remove-profile-image');
    }

    public function mount()
    {
        $this->setUser();
    }

    private function setUser()
    {
        Auth::user();
    }

    public function removeProfileImage()
    {

        $account =  Auth::user();
        $account->update([
            'avatar' => "https://ui-avatars.com/api/?background=9AB2E2&color=185ADB&name=" . Auth::user()->name,
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Profile berhasil di hapus',
        ];

        $this->setToast($alert['status'], $alert['title'], $alert['message']);
        $this->dispatch('setting:profileImageUpdated');
    }

    public function setToast($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'text' => $message,
        ]);
    }
}
