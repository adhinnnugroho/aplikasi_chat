@props(['show_id' => $id])
<div x-show="{{$show_id}}" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-on:click="{{$show_id}} = false" x-show="{{$show_id}}"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
        ></div>

        <div x-cloak x-show="{{$show_id}}"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
        >
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">{{ $title }}</h1>

                {{ $icon }}
                {{-- <button x-on:click="{{$show_id}} = false" class="text-red-600 focus:outline-none hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button> --}}
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                {{ $subtitle }}
            </p>

            <div class="mt-4 text-justify text-sm font-normal min-w-full"style="background-color: white">
                {{ $slot }}
            </div>

            <div class="bg-white dark:bg-gray-800 bg-opacity-50 px-4 py-3 flex flex-row-reverse flex-wrap gap-2" style="background-color: white">
                @isset($footer)
                    {{ $footer }}
                @endisset
            </d>
        </div>
    </div>
</div>
