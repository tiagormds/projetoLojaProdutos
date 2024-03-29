<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loja.css') }}" >
    <title>Nosso Site - @yield('title')</title>
</head>
<body>
    <div class="container">
        @include('layout.navbar')
        @include('layout.messagensDeValidacoes')
        @include('layout.errorsAndStatus')
        <div class="principal">
            @yield('content')
        </div>
    </div>


    <script href="{{ asset('css/bootstrap.js') }}"></script>
</body>
</html>