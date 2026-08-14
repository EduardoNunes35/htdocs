<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('imgs/icones/favicon.ico') }}" type="image/x-icon">
    <title>PrettusKlan Siga</title>

    <style>
        @font-face {
            font-family: 'vila madalena';
            src: url("{{ asset('/fonts/vila madalena.otf') }}");
        }
        body { font-family: 'vila madalena', sans-serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- 🔥 AQUI ESTAVA FALTANDO --}}
    @stack('styles')
</head>
<body>

    <nav class="py-4 px-10">
        <a href="{{ url('/') }}">
            <button class="bg-green-500 hover:bg-red-500 text-white font-bold px-4 rounded">&times;</button>
        </a>
    </nav>

    <center>
        <header class="py-5">
            @auth
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <button @click="open = !open" class="inline-flex items-center px-4 py-2 border rounded-md bg-white">
                    {{ Auth::user()->name }}
                    <svg class="ms-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 z-50 mt-2 w-48 bg-white shadow-lg rounded-md">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </header>

        <main>
            @yield('content')
        </main>
    </center>

    <script src="{{ asset('js/alpine.js') }}" defer></script>

    {{-- Scripts extras das views --}}
    @stack('scripts')
</body>
</html>