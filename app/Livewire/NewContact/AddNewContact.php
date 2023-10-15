<?php

namespace App\Livewire\NewContact;

use App\Models\User;
use Livewire\Component;
use App\Models\ListContact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddNewContact extends Component
{
    use LivewireAlert;
    public $search;
    public $user;

    public function render()
    {
        return view('livewire.new-contact.add-new-contact');
    }

    public function mount(){
        $this->user = collect([]);
    }

    public function updatedSearch($value){
        $this->user = User::where(function ($query) use ($value) {
            $query->where('name', 'like', '%' . $value . '%')
                ->orWhere('username', 'like', '%' . $value . '%');
        })
        ->where('id', '!=', Auth::user()->id)
        ->get();
    }

    public function validationFrom($id){
        $uuid = Str::uuid();
        ListContact::create([
            'uuid' => $uuid,
            'id_user' => $id,
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Kontak Berhasil Ditambahkan',
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
