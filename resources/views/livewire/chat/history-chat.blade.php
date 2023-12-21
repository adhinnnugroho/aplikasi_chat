<div>
    <div class="flex px-5 flex-col mt-10 flex-grow overflow-y-auto">
        <div class="flex-grow overflow-y-auto">
            <div class="flex justify-end mb-4">
                <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                    {{ $selectedContactId }}
                </div>
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
            </div>
            <div class="flex justify-start mb-4">
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
                <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                    {{$account_data->username ?? null}}
                </div>
            </div>
            <div class="flex justify-end mb-4">
                <div>
                    <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Magnam, repudiandae.
                    </div>

                    <div class="mt-4 mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Debitis, reiciendis!
                    </div>
                </div>
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
            </div>
            <div class="flex justify-start mb-4">
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
                <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                    happy holiday guys!
                </div>
            </div>
        </div>
    </div>
    <div class="border-b-2 bg-gray-200 w-full p-4 bottom-0 fixed">
        <div class="flex flex-wrap gap-6" x-data="{inputValue: '{{$chatvalue}}'}">
            <i class="fas fa-plus text-2xl text-gray-500 mt-1"></i>

                <input class="bg-gray-300 rounded-lg w-[63rem] px-4 py-2 focus:border-gray-300" type="text"
                        placeholder="Ketik pesan Anda..."  x-ref="input" x-model="inputValue" wire:model.lazy="chatvalue" @keydown.enter="submitForm">
            <i class="fas fa-microphone text-2xl float-right mt-1 fixed right-7 text-gray-500"></i>
        </div>
    </div>

    @push('scripts')
        <script>
            function submitForm(){
                Livewire.dispatch('savedChat', { postId: 2 })
            }
        </script>
    @endpush
</div>
