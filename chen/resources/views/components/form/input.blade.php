@props(['name', 'type' => 'text', 'value' => null])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-black-700"
        for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label>

    <input class="border border-gray-200 p-2 w-full rounded"
        type="{{ $type }}" 
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"

    >

    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
