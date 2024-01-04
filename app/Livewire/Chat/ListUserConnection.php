<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Encryption;
use App\Models\ListContact;
use Illuminate\Support\Facades\Auth;

class ListUserConnection extends Component
{
    public $user;
    public $selected_contact, $count_message_not_read;
    public $search_chat;
    public $listeners = [
        'refreshNavbar' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.chat.list-user-connection');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
        })
            ->orWhere(function ($query) use ($data_userLogin) {
                $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();
    }

    public function updatedSearchChat(){
        dd("test");
    }

    public function setNewUser()
    {
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
        })
            ->orWhere(function ($query) use ($data_userLogin) {
                $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();
    }

    public function updateReadAt($contactId){
        dd($contactId);
    }

    public function readMessage()
    {
        dd("test");
        // $code = Encryption::decryptId($chat_id);
        Message::where([
            'chat_id' => $code,
        ])->update([
            'read_at' => date('Y-m-d, H:i:s'),
        ]);
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
        })
            ->orWhere(function ($query) use ($data_userLogin) {
                $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();
    }
}
