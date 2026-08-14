<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

        <!-- Bootstrap CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="//unpkg.com/alpinejs" defer></script>
        <title>PKCia.com Siga</title>
    </head>


            <div>
               <center><img width='25px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"/></center>
            </div>

    <body>
        @yield('content')
    </body>
</html>
