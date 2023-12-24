<div>
    <div class="flex px-5 flex-col mt-10 flex-grow overflow-y-auto">
        <div class="flex-grow overflow-y-auto">
            @foreach ($chat as $index => $item)
                @if ($item->sender_id == $user_login->id)
                    <!-- Pesan yang dikirim oleh pengguna saat ini -->
                    <div class="flex justify-end mb-4">
                        <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                            {{ $item->boddy_message }}
                        </div>
                        <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                            class="object-cover h-8 w-8 rounded-full" alt="" />
                    </div>
                @else
                    <!-- Pesan yang diterima oleh pengguna saat ini -->
                    <div class="flex justify-start mb-4">
                        <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                            class="object-cover h-8 w-8 rounded-full" alt="" />
                        <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                            {{ $item->boddy_message }}
                        </div>
                    </div>
                @endif
                {{-- <div class="flex justify-end mb-4">
                    <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                        {{ $item->boddy_message }}
                    </div>
                    <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                        alt="" />
                </div> --}}
            @endforeach
            {{-- @if (!is_null($user_chat))
                    <div class="flex justify-start mb-4">
                        <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                            alt="" />
                        <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                            {{ $item->boddy_message }}
                        </div>
                    </div>
                @endif --}}
            {{-- <div class="flex justify-end mb-4">
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
            </div> --}}
        </div>
    </div>
</div>
