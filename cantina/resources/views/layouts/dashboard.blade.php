<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('imgs/icones/favicon.ico') }}" type="image/x-icon">
    <title>PKCia - Siga</title>
        
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- ✅ ESTILOS DAS VIEWS --}}

    @stack('styles')
</head>

<body>
    <div style="text-align: center;">
        <main>            
            <nav class="mb-6 max-w-5xl mx-auto">
                <div class="flex items-center justify-end gap-4 px-4 py-4">
                    {{-- Dropdown do Usuário --}}
                    @auth
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <button @click="open = !open" 
                                class="inline-flex items-center px-4 py-2 border rounded-md bg-gray-500 shadow-sm hover:bg-gray-50 focus:bg-white focus:outline-none active:bg-white transition">
                                <i class="fa-solid fa-user-circle"></i> &nbsp;&nbsp; {{ Auth::user()->name }}
                                <svg class="ms-2 h-5 w-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>

                            {{-- Menu Dropdown --}}
                            <div x-show="open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                @click.away="open = false" 
                                class="absolute right-0 z-50 mt-2 w-48 bg-white shadow-lg rounded-md border border-gray-100 overflow-hidden"
                                style="display: none;">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    {{-- Botão Sair com proteção de cor no foco --}}
                                    <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-400 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none transition">
                                        <i class="fa-solid fa-right-from-bracket"></i> Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    {{-- Botão de Fechar/Voltar --}}
                    <a href="{{ url()->previous() }}">
                        <button class="bg-green-500 hover:bg-red-600 text-white font-bold h-10 px-4 rounded transition-colors shadow-sm flex items-center justify-center">
                            &times;
                        </button>
                    </a>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/alpine.js') }}" defer></script>
    @stack('scripts')
    
</body>
</html>