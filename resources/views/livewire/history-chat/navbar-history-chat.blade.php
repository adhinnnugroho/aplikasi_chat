<div class="border-b-2 bg-gray-200 p-4 fixed w-screen">
    <div class="flex flex-wrap justify-between">
        <a href="#"  x-on:click="openSidebar = !openSidebar">
            <div class="flex flex-warp">
                <img src="{{$selectedContact->avatar}}" alt="" class="rounded-full h-12 w-12 ml-3">
                <h5 class="mt-3 ml-2">
                    {{$selectedContact->username}}
                </h5>
            </div>
        </a>
    </div>
</div>

