@props(['name','type'=>'text'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-black-700"
        for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label>

    <textarea class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{$attributes}}
    >{{$slot ??old($name) }}</textarea>

    @error($name)
        p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

