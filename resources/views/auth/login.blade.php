@extends('base')

@section('title', 'Se connecter')

@section('content')

    <div class="mt-5 container mx-auto w-1/3">
        <h1 class="text-3xl dark:text-blanc text-center">@yield('title')</h1>

        @include('shared.flash')

        <form action="{{ route('login') }}" method="post" class="gap-3 dark:text-blanc">
            @csrf
            @include('shared.input', ['type' => 'email', 'name' => 'email', 'label' => 'Email', 'class' => 'my-3'])
            @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe'])
            <div>
                <button class="rounded bg-bleu-clair mt-5 hover:bg-bleu px-6 pb-2 pt-2.5 text-blanc">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
@endsection