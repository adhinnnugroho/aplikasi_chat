<div x-data="{
    listUserConnects: {{ $user }},
    countUserConnectlist: {{ count($user) }},
    selectedContact: '',
    openSidebar: false,
    openSettingSidebar: false,
    openSettingProfile: false
}" id="my-chat-list">
    <div class="flex flex-row justify-between bg-white">
        <!-- chat list -->
        <div class="lg:w-2/5 w-screen ">
            <div x-show="!openSettingProfile">
                <div class="" x-show="!openSettingSidebar">
                    <div class="fixed overflow-y-auto lg:w-2/7 w-full">
                        <div class="flex flex-col lg:border-r-2 h-screen">
                            @livewire('layout.partials.navbar.navbar-list-user')
                            <div class="py-4 px-2">
                                <input type="text" placeholder="search chatting"
                                    class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full" wire:model.live="search_chat"/>
                            </div>
                            @if (count($user) > 0)
                                {{-- <template x-for="userList in listUserConnects">
                                    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
                                        x-on:click="selectedContact = userList.id">
                                        <div class="w-1/4">
                                            <img :src="userList.user.avatar"
                                                class="object-cover h-12 w-12 ml-5 rounded-full" alt="" />
                                        </div>
                                        <div class="w-full">
                                            <div class="text-lg font-semibold" x-text="userList.user.name"></div>
                                            <span class="text-gray-500">Pick me at 9:00 Am</span>
                                        </div>
                                    </div>
                                </template> --}}

                                @foreach ($user as $item)
                                    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer" wire:key="{{$item->EncrytionsChatId($item->id)}}"
                                        {{-- x-on:click="selectedContact = '{{ $item->receiver->id ?? $item->sender->id }}'"> --}}
                                        wire:click.stop="readMessage"
                                        x-on:click="selectedContact = '{{ $item->receiver->id ?? $item->sender->id }}'; $wire.updateReadAt('{{ $item->receiver->id ?? $item->sender->id }}')">
                                        <div class="w-1/4">
                                            <img src="{{ $item->receiver->user->avatar ?? $item->sender->user->avatar }}"
                                                class="object-cover h-12 w-12 ml-5 rounded-full" alt="" />
                                        </div>
                                        <div class="w-full">
                                            <div
                                                class="{{ $item->unreadMessagesCount($item->id) > 0 ? 'text-black font-bold' : 'font-semibold' }} text-lg ">
                                                {{ $item->receiver->user->name ?? $item->sender->user->name }}
                                            </div>
                                            <span
                                                class="{{ $item->unreadMessagesCount($item->id) > 0 ? 'text-black font-bold' : 'text-gray-500' }}">
                                                {{ implode('..', str_split($item->lastMessage->boddy_message, 20)) }}
                                            </span>
                                            <div
                                                class="{{ $item->unreadMessagesCount($item->id) > 0 ? 'text-black font-bold' : 'text-gray-500' }} float-right lg:-mt-5">
                                                {{ date('H:i', strtotime($item->lastMessage->created_at)) }}
                                            </div>
                                            @if ($item->unreadMessagesCount($item->id) > 0)
                                                <div
                                                    class="float-right mt-1 bg-green-700 rounded-full text-white w-6 h-6
                                                text-center lg:-mr-7">
                                                    {{ $item->unreadMessagesCount($item->id) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-gray-400 text-center mt-5">Data not found</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="!openSettingProfile">
                <div class="" x-show="openSettingSidebar">
                    @livewire('setting.sidebar')
                </div>
            </div>

            <div x-show="openSettingProfile">
                @livewire('setting.profile.profile-setting')
            </div>
        </div>
        <!-- end chat list -->
        <!-- message -->
        <div class="lg:w-full">
            <div class="overflow-y-auto">
                @foreach ($user as $key => $item)
                    <template x-if="selectedContact == '{{ $item->receiver->id ?? $item->sender->id }}'">
                        <div class="flex flex-col justify-between">
                            @livewire('history-chat.navbar-history-chat', [
                                'selectedContactId' => $item->receiver->id_user ?? $item->sender->id_user,
                            ])
                            <div class="">
                                @livewire('chat.history-chat', [
                                    'selectedContactId' => $item->receiver->id_user ?? $item->sender->id_user,
                                ])
                            </div>
                        </div>
                    </template>
                @endforeach
            </div>
        </div>
        <!-- end message -->
        <div class="lg:w-2/5 lg:border-l-2 lg:px-5" x-show="openSidebar">
            @foreach ($user as $key => $item)
                <template
                    x-if="selectedContact == '{{ $item->EncrytionsChatId($item->receiver->id ?? $item->sender->id) }}'">
                    @livewire('history-chat.sidebar-history-chat', [
                        'selectedContactId' => $item->receiver->id ?? $item->sender->id,
                    ])
                </template>
            @endforeach
        </div>
    </div>
</div>
