<!doctype html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title') | Agence Immobilier de Neuneu</title>
</head>
<body class="dark:bg-noir font-body">
@include('shared.nav')


@yield('content')
</body>
</html>