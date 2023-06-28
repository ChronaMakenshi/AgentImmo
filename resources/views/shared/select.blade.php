@php
    $name ??= '';
    $class??= null;
    $value??= '';
    $label ??= ucfirst($name);
@endphp

<div @class([$class])>
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            <option  @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="text-rouge">
        {{ $message }}
    </div>
    @enderror
</div>