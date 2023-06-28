@php
    $type ??= 'text';
    $name ??= '';
    $class??= null;
    $value??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
    @if($type == 'textarea')
        <textarea type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
               class="shadow block @error($name) border-rouge @enderror  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-bleu">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
               class="shadow block @error($name) border-rouge @enderror  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-bleu">
    @endif
   @error($name)
    <div class="text-rouge">
        {{ $message }}
    </div>
    @enderror
</div>