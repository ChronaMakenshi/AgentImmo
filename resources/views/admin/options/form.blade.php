@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Créer une option")

@section('content')

    <h1 class="text-3xl font-bold text-bleu mb-5 dark:text-blanc">@yield('title')</h1>
    <form class="bg-blanc mt-5 shadow-lg rounded px-8 pt-6 pb-8 mb-4 dark:bg-gris"
          action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
          method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')
        <div>
            @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $option->name])
        </div>
        <div>
            <button class="btn btn-primary rounded bg-bleu-clair mt-5 hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">
                @if(@$option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection