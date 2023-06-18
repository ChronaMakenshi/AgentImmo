@php
    $class ??= null
@endphp

<div @class('mt-5', $class)>
    <label class="relative inline-flex items-center mb-5 cursor-pointer">
        <input type="hidden" value="0"  name="{{ $name }}">
        <input @checked(old($name, $value ?? false)) type="checkbox" value="1" class="sr-only peer @error($name) border-rouge text-rouge @enderror" name="{{ $name }}" role="switch" id="{{ $name }}">
        <div class="w-11 h-6 bg-rouge rounded-full peer  dark:bg-rouge peer-focus:ring-4 peer-focus:ring-rouge dark:peer-focus:ring-rouge peer-checked:after:translate-x-full peer-checked:after:border-blanc after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-blanc after:border-gris-clair after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gris-foncer peer-checked:peer-focus:ring-bleu peer-checked:dark:peer-focus:ring-bleu peer-checked:bg-bleu"></div>
        <span class="ml-3 text-sm font-bold dark:text-noir">{{ $label }}</span>
    </label>
    @error($name)
    <div class="text-rouge">
        {{ $message }}
    </div>
    @enderror
</div>