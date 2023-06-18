@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-bleu mb-5 dark:text-blanc ">@yield('title')</h1>
            <a href="{{ route('admin.option.create') }}" class="rounded bg-bleu-clair hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">Ajouter une option</a>
        </div>

        <div class="relative max-w-xl min-w-sm overflow-x-auto shadow-md sm:rounded-lg dark:border-gris-foncer">

            <table class="w-full shadow-lg text-blanc text-left text-gris dark:text-gris">
                <thead class="border-b text-xs text-gray-700  uppercase dark:text-gris">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris-foncer">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gris-clair dark:bg-gris-foncer">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($options as $option)
                <tr class="border-gris dark:border-gris-foncer">
                    <td scope="row" class="px-6 py-4 bg-gris-clair font-medium text-gris-foncer whitespace-nowrap bg-gray-50 dark:text-blanc dark:bg-gris-foncer">
                        {{ $option->name }}
                    </td>
                    <td class="px-6 py-4 bg-gris-clair dark:border-gris-foncer dark:text-blanc dark:bg-gris-foncer">
                        <div class="flex gap-3.5 w-full justify-end">
                            <a href="{{ route('admin.option.edit', $option) }}" class="rounded bg-bleu hover:bg-bleu-clair px-3 pb-2 pt-2.5 text-blanc">Editer</a>
                            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="rounded bg-rouge hover:bg-rouge-clair px-3 pb-2 pt-2.5 text-blanc">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="relative max-w-5xl min-w-sm overflow-x-auto mt-5">
            {{ $options->links() }}
        </div>


@endsection