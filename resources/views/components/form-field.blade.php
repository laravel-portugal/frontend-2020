<div class="pb-6">
    <label @isset($id) for="{{ $id }}" @endisset class="block text-gray-700 uppercase">
        {{ $label }}
    </label>
    <div class="rounded-md shadow-sm">
        {{ $slot }}
    </div>
    @isset($id)
        @error($id) <span class="error"> {{ $message }} </span> @enderror
    @endisset
</div>
