<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use App\Helpers\Encryption;
use Illuminate\Support\Facades\Auth;

class ListChat extends Component
{
    public $user, $search_chat;
    public function render()
    {
        return view('livewire.chat.list-chat');
    }

    public function readMessage($contact_id){
        $data_userLogin = Auth::user();
        $code = Encryption::decryptId($contact_id);
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

    public function updatedSearchChat(){
        $data_userLogin = Auth::user();

        $searchTerm = $this->search_chat;
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
        })
            ->orWhere(function ($query) use ($data_userLogin) {
                $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
            })->where(function ($query) use ($searchTerm) {
                $query->whereHas('receiver.user', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%$searchTerm%");
                })->orWhereHas('sender.user', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%$searchTerm%");
                });
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();
    }
}
