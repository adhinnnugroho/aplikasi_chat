<div>
    <div class="flex flex-col">
        <div class="font-semibold text-xl py-4">{{$selectedContact->username}}</div>
        <img src="{{$selectedContact->avatar}}" class="object-cover rounded-xl h-64"
            alt="" />
        <div class="font-semibold py-4">{{$selectedContact->info_account ?? "sibuk"}}</div>
        {{-- <div class="font-light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt,
            perspiciatis!
        </div> --}}
    </div>
</div>
