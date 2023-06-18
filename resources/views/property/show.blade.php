@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mx-auto">
        <h1 class="font-bold text-center underline text-5xl dark:text-blanc my-8">{{ $property->title }}</h1>
        @if($property->sold)
            <div class="flex mx-auto justify-center p-4 w-1/3 mb-4 text-sm text-rouge border-[8px] border-rouge-clair rounded-lg bg-red-50 dark:bg-gris-foncer dark:text-rouge-clair dark:border-rouge"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-8 h-9 mr-3" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-bold text-2xl">L'appartement à été vendu</span>
                </div>
            </div>
        @else
            <div class="flex mx-auto justify-center p-4 w-1/2 mb-4 text-sm text-vert-foncer border-[8px] border-vert rounded-lg bg-red-50 dark:bg-gris-foncer dark:text-vert dark:border-vert-foncer"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-8 h-9 mr-3" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-bold text-2xl">L'appartement n'est pas encore été vendu</span>
                </div>
            </div>
        @endif
        <h2 class="font-bold text-center text-1xl dark:text-blanc">{{ $property->rooms }} pièces
            - {{ $property->surface }} m²</h2>

        <div class="p-2 text-bleu font-bold w-1/2 text-4xl my-5 border-4 border-bleu rounded flex mx-auto justify-between dark:text-bleu-clair dark:border-bleu-clair">
            Prix du logement : <span>{{ number_format($property->price, thousands_separator: '') }} €</span>
        </div>
        <hr>
        <div class="mt 5">
            <h4 class="text-2xl font-bold underline my-6 text-center dark:text-blanc">Intéresse par ce bien ?</h4>
            <form action="" method="post"
                  class="gap-3 bg-blanc mt-5 shadow-lg rounded px-8 pt-6 pb-8 mb-4 dark:bg-gris">
                <div class="columns-2">
                    @include('shared.input', ['label' => 'Prénom', 'name' => 'firstname'])
                    @include('shared.input', ['label' => 'Nom', 'name' => 'lastname'])
                </div>
                <div class="columns-2 my-2">
                    @include('shared.input', ['label' => 'Téléphone', 'name' => 'phone'])
                    @include('shared.input', ['type' => 'email', 'label' => 'Email', 'name' => 'email'])
                </div>
                @include('shared.input', ['type' => 'textarea', 'label' => 'Votre message', 'name' => 'message'])
                <div class="flex justify-center">
                    <button class="rounded  bg-bleu-clair mt-5 hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">
                        Nous contacter
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-5">
            {{--        Ne prend pas la HTML --}}
            {{--        <p>{{ nl2br($property->description) }}</p>--}}
            {{--        prend la HTML --}}
            <h4 class="underline font-bold text-center text-2xl dark:text-blanc">Description</h4>
            <p class="my-6 text-center dark:text-blanc">{!! nl2br($property->description) !!} </p>
            <div class="flex justify-around">
                <div>
                    <h2 class="underline font-bold text-1xl mb-2 dark:text-blanc">Caractéristique</h2>
                    <table class="w-full shadow-lg">
                        <thead class="border-b text-xs text-noir font-bold uppercase">
                        <tr>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                Surface habitable
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                {{ $property->surface }} m²
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="px-6 py-3 bg-gris dark:bg-gris-foncer">
                                Pièces
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gris dark:bg-gris-foncer">
                                {{ $property->rooms }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                Chambres
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                {{ $property->bedrooms }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="px-6 py-3 bg-gris dark:bg-gris-foncer">
                                Étage
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gris dark:bg-gris-foncer">
                                {{ $property->floors ?: 'Rez de chaussé' }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                localisation
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris">
                                {{ $property->address }}<br/>
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <h2 class="underline font-bold text-1xl mb-2 dark:text-blanc">Spécificité</h2>
                    <ul class="w-48 text-sm font-medium text-gris-foncer bg-white border border-gris rounded-lg dark:bg-blanc dark:border-gris dark:text-noir">
                        @foreach($property->options as $option)
                            <li class="w-full px-4 py-2  border-b border-gris-clair rounded-t-lg">{{ $option->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection