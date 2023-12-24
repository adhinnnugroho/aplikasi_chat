<div>
    <div class="flex px-5 flex-col mt-24 flex-grow overflow-y-auto mb-28">
        <div class="flex-grow overflow-y-auto">
            @foreach ($chat as $index => $item)
                @foreach ($item->Messages as $message)
                    @if ($item->sender_id == $user_login->id)
                        <div class="flex justify-start mb-4">
                            <div
                                class="ml-2 py-3 px-4 bg-blue-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                                {{ $message->boddy_message }}
                            </div>
                        </div>
                    @else
                        <div class="flex justify-end mb-4">
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <p class="text-gray-800 mr-14 -mb-5">
                                    {{ $message->boddy_message }}
                                </p>
                                <div class="flex items-center  float-right">
                                    <p class="text-xs text-gray-500">
                                        {{ date('H:i', strtotime($message->created_at)) }}
                                    </p>
                                    @if (!is_null($message->read_at))
                                        <div class="fa fa-check text-xs text-green-500 ml-1"></div>
                                    @else
                                        <div class="fa fa-check text-xs text-gray-500 ml-1"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
