@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')

    <h1 class="text-3xl font-bold text-bleu mb-5 dark:text-blanc underline">@yield('title')</h1>
    <form class="bg-blanc mt-5 shadow-lg rounded px-8 pt-6 pb-8 mb-4 dark:bg-gris"
          action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
          method="post"
          enctype="multipart/form-data"
    >
        @csrf
        @method($property->exists ? 'put' : 'post')
        <div class="columns-2 mb-2">
            <div>
            @include('shared.input', ['class' => 'mb-3', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            @include('shared.input', ['type' => 'file', 'label' => 'Images', 'name' => 'image', 'value' => $property->image])
            </div>
            <div>
                @include('shared.input', ['class' => 'mb-3', 'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['label' => 'Prix', 'class' => '', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>
        @if($property->image)
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">L'image utilisé</label>
            <img class="mb-2" src="{{ image($property->image , 180, 100) }}" alt="">
        @endif
        @include('shared.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])
        <div class="columns-3 my-3">
            @include('shared.input', ['label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['label' => 'Étage', 'name' => 'floors', 'value' => $property->floors])
        </div>
        <div class="columns-3 mb-3">
            @include('shared.input', ['label' => 'Adressse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code])
            @include('shared.input', ['label' => 'Ville', 'name' => 'city', 'value' => $property->city])
        </div>
        @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
        @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold, 'options' => $options])
        <div>
            <button class="rounded bg-bleu-clair mt-5 hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">
                @if(@$property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
@endsection