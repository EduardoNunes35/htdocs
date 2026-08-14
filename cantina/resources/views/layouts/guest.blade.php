<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <link href="{{ asset('imgs/icones/att.logo.ico') }}" rel="shortcut icon" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    {{-- Aqui entra o conteúdo do componente --}}
    {{ $slot }}

    @livewireScripts
</body>

</html>