<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

       <title>PK Cia - Siga</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
        </style>

        @stack('styles')
    </head>

    <body>
        
        <main class="max-w-5xl mx-auto">
            @yield('content')
        </main>

    </body>    
</html>
