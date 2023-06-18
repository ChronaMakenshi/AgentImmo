@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-bleu mb-5 dark:text-blanc ">@yield('title')</h1>
            <a href="{{ route('admin.property.create') }}"
               class="rounded bg-bleu-clair hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">Ajouter un bien</a>
        </div>
        <div class="relative max-w-5xl min-w-sm overflow-x-auto shadow-md sm:rounded-lg dark:border-gris-foncer">

            <table class="w-full shadow-lg text-blanc text-left text-gris dark:text-gris">
                <thead class="border-b text-xs text-gray-700  uppercase dark:text-gris">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris-foncer">
                        Titre
                    </th>
                    <th scope="col" class="px-6 py-3 dark:bg-gris dark:text-blanc">
                        Surface
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris-foncer">
                        Prix
                    </th>
                    <th scope="col" class="px-6 py-3 dark:bg-gris dark:text-blanc">
                        Ville
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris-foncer">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($properties as $property)
                    <tr class="border-gris dark:border-gris-foncer">
                        <td scope="row"
                            class="px-6 py-4 bg-gris-clair font-medium text-gris-foncer whitespace-nowrap bg-gray-50 dark:text-blanc dark:bg-gris-foncer">
                            {{ $property->title }}
                        </td>
                        <td class="px-6 py-4 dark:bg-gris dark:text-blanc">
                            {{ $property->surface }} m²
                        </td>
                        <td class="px-6 py-4 bg-gris-clair dark:border-gris-foncer dark:text-blanc dark:bg-gris-foncer">
                            {{ number_format($property->price, thousands_separator:' ') }}
                        </td>
                        <td class="px-6 py-4 dark:bg-gris dark:text-blanc">
                            {{ $property->city }}
                        </td>
                        <td class="px-6 py-4 bg-gris-clair dark:border-gris-foncer dark:text-blanc dark:bg-gris-foncer">
                            <div class="flex gap-3.5 w-full justify-end">
                                <a href="{{ route('admin.property.edit', $property) }}"
                                   class="rounded bg-bleu hover:bg-bleu-clair px-3 pb-2 pt-2.5 text-blanc">Editer</a>
                                <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="rounded bg-rouge hover:bg-rouge-clair px-3 pb-2 pt-2.5 text-blanc">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="relative max-w-5xl min-w-sm overflow-x-auto mt-5">
            {{ $properties->links() }}
        </div>
    </div>
@endsection