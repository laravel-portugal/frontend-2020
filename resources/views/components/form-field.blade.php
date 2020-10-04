<div class="mt-6">
    <label @isset($id) for="{{ $id }}" @endisset class="block text-sm font-medium leading-5 text-gray-700">{{$label}}</label>
    <div class="mt-1 rounded-md shadow-sm">
        {{ $slot }}
    </div>
    @isset($id)
    @error( $id ) <span class="error">{{ $message }}</span> @enderror
    @endisset
</div>
