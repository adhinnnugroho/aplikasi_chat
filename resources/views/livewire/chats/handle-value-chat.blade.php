<div>
    <div class="flex px-5 flex-col mt-10 flex-grow overflow-y-auto">
        <div class="flex-grow overflow-y-auto">
            @foreach ($chat as $index => $item)
                @if ($item->sender_id == $user_login->id)
                    <div class="flex justify-start mb-4">
                        <div class="ml-2 py-3 px-4 bg-blue-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                            {{ $item->boddy_message }}
                        </div>
                    </div>
                @else
                    {{-- <div class="flex justify-end mb-3">
                        <div class="mr-2 bg-blue-400 text-white pl-2 pt-2">
                            {{ $item->boddy_message }}

                            <p class="float-right mt-6 mr-2 mb-2">
                                {{ date('H:i', strtotime($item->created_at)) }}
                            </p>
                        </div>
                    </div> --}}
                    <div class="flex justify-end mb-4">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <p class="text-gray-800">
                                {{ $item->boddy_message }}
                            </p>
                            <div class="flex items-center mt-2 float-right">
                                {{-- <div class="w-2 h-2 bg-green-500 rounded-full ml-1"></div> --}}
                                <p class="text-xs text-gray-500">
                                    {{ date('H:i', strtotime($item->created_at)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
