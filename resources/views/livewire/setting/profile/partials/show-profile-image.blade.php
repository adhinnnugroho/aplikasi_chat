<div x-data="{ modelOpen: false }">
    <li class="p-2 hover:bg-gray-300 cursor-pointer" x-on:click="modelOpen = !modelOpen">
        <a href="#">Lihat Foto</a>
    </li>
    <x-modal.simple-modal id="show-profile-picture" show_id="modelOpen" title="Foto Profil" subtitle="" wire:ignore>
        <div class="max-h-[42rem] min-w-[20rem] overflow-x-hidden">
            <x-slot name="icon">
                <button x-on:click="modelOpen = false" class="text-red-600 focus:outline-none hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </x-slot>
            <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-full w-64 h-64 content-center mx-auto">
            {{-- <div>
                <x-slot name="footer">
                    <div class="flex flex-wrap gap-4">
                        <div>
                            <x-button.rounded-button id="btn-close-private-otp-form-modal-announcement-page"
                                color="gray" wire:loading.attr="disabled" x-on:click="open = false;">
                                {{ __('tutup') }}
                            </x-button.rounded-button>
                            <x-button.rounded-button wire:loading.attr="disabled" wire:offline.attr="disabled"
                                wire:click="validationFrom">
                                <div wire:loading.remove wire:target="validationFrom">
                                    {{ __('simpan') }}
                                </div>
                                <div wire:loading wire:target="validationFrom">
                                    <i class="fa fa-circle-notch fa-spin mr-2"></i>
                                    {{ __('Prosessing..') }}
                                </div>
                            </x-button.rounded-button>
                        </div>
                    </div>
                </x-slot>
            </div> --}}
        </div>
    </x-modal.simple-modal>
</div>
