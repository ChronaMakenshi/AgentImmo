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
               class="shadow dark:bg-gris-clair block @error($name) border-rouge text-rouge @enderror  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-bleu">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
               class="shadow dark:bg-gris-clair block @error($name) border-rouge text-rouge @enderror  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-bleu">
    @endif
   @error($name)
    <div class="text-rouge dark:font-bold dark:saturate-200">
        {{ $message }}
    </div>
    @enderror
</div>