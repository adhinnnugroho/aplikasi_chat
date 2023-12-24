<div>

    @if (is_null($history_chat))

    @else
        @livewire('chats.handle-value-chat', [
            'chat_id' => $history_chat->id,
            'selectedContactId' => $selectedContactId
        ])
    @endif





    <div class="border-b-2 bg-gray-200 w-full p-4 bottom-0 fixed">
        <div class="flex flex-wrap gap-6" x-data="{inputValue: '{{$chatvalue}}'}">
            <i class="fas fa-plus text-2xl text-gray-500 mt-1"></i>

                <input class="bg-gray-300 rounded-lg w-[63rem] px-4 py-2 focus:border-gray-300" type="text"
                        placeholder="Ketik pesan Anda..."  x-ref="input" x-model="inputValue" wire:model.lazy="chatvalue" @keydown.enter="submitForm">
            <i class="fas fa-microphone text-2xl float-right mt-1 fixed right-7 text-gray-500 cursor-pointer"></i>
        </div>
    </div>

    @push('scripts')
        <script>
            function submitForm(){
                Livewire.dispatch('savedChat')
            }
        </script>
    @endpush
</div>
