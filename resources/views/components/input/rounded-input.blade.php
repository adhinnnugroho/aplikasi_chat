<input {{ $attributes->merge(['class' =>  "w-full min-h-10 px-3 py-1.5 text-sm font-normal text-gray-700
    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition
    ease-in-out m-0 ease-in-out m-0 focus:outline-none focus:text-gray-700 focus:ring-0 focus:border-gray-300
    disabled:bg-gray-100 disabled:border disabled:border-gray-300 disabled:text-gray-900 disabled:text-sm disabled:rounded-lg
    disabled:cursor-not-allowed
     " . (isset($error) && !is_null($error) && $errors->has($error) ? 'border-red-500' : ''), 'value' => isset($error) ? old($error) : '' ]) }}
    wire:loading.attr="disabled">

@if(isset($error) && !is_null($error))
    @error($error)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
@endif
