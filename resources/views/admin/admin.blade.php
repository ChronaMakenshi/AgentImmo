<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title') | Adminstration</title>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
</head>
<body class="dark:bg-noir font-body">
@include('shared.nav')
<div class="container mx-auto mt-10">
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-vert dark:bg-vert-foncer dark:text-blanc" role="alert">
            <span class="font-medium">{{session('success')}}</span>
        </div>
    @endif
    @if(session('danger'))
        <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-rouge-clair dark:bg-rouge dark:text-blanc" role="alert">
            <span class="font-medium">{{session('danger')}}</span>
        </div>
    @endif
    {{--            Pour trouver les erreurs d'entrée--}}
    {{--            @if($errors->any())--}}
    {{--                <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-rouge-clair dark:bg-rouge dark:text-blanc" role="alert">--}}
    {{--                    <span class="font-medium">--}}
    {{--                    @foreach($errors->all() as $error) --}}
    {{--                        <li>{{ $error }}</li>--}}
    {{--                    @endforeach--}}
    {{--                    </span>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    @yield('content')
</div>
<script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
</script>
</body>
</html>