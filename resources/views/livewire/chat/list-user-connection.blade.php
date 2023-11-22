<div x-data="{
    listUserConnects: {{ $user }},
    countUserConnectlist: {{ count($user) }},
    selectedContact: '',
    openSidebar: false,
    openSettingSidebar: false,
    openSettingProfile: false
}">
    <div class="flex flex-row justify-between bg-white">
        <!-- chat list -->
        <div class="w-2/5">
            <div x-show="!openSettingProfile">
                <div class="" x-show="!openSettingSidebar">
                    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
                        @livewire('layout.partials.navbar.navbar-list-user')
                        <div class="py-4 px-2">
                            <input type="text" placeholder="search chatting"
                                class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full" />
                        </div>

                        @if (count($user) > 0)
                        <template x-for="userList in listUserConnects">
                            <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
                                x-on:click="selectedContact = userList.id">
                                <div class="w-1/4">
                                    <img :src="userList.user.avatar" class="object-cover h-12 w-12 ml-5 rounded-full"
                                        alt="" />
                                </div>
                                <div class="w-full">
                                    <div class="text-lg font-semibold" x-text="userList.user.name"></div>
                                    <span class="text-gray-500">Pick me at 9:00 Am</span>
                                </div>
                            </div>
                        </template>
                        @else
                            <span class="text-gray-400 text-center mt-5">Data not found</span>
                        @endif
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
        <div class="w-full">
            @foreach ($user as $key => $item)
                <template x-if="selectedContact == '{{ $item->id }}'">
                    <div class="flex flex-col justify-between">
                        @livewire('history-chat.navbar-history-chat', [
                            'selectedContactId' => $item->id_user,
                        ])
                        <div class="">
                            @livewire('chat.history-chat', [
                                'selectedContactId' => $item->id_user,
                            ])
                        </div>
                    </div>
                </template>
            @endforeach
        </div>
        <!-- end message -->
        <div class="w-2/5 border-l-2 px-5" x-show="openSidebar">
            @foreach ($user as $key => $item)
                <template x-if="selectedContact == '{{ $item->id }}'">
                    @livewire('history-chat.sidebar-history-chat', [
                        'selectedContactId' => $item->id,
                    ])
                </template>
            @endforeach
        </div>
    </div>
</div>
