@props(['type' => 'text', 'field'])

<div class="mb-4">
    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="{{ $field }}">{{ $slot }}</label>
    <input {!! $attributes->merge(['class' => 'border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400']) !!} />
{{--    @error($field)--}}
{{--    {{ $message }}--}}
{{--    @enderror--}}
    <x-form-error :field="$field"></x-form-error>
</div>
