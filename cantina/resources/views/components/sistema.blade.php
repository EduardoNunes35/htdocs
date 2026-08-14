@extends('layouts.modal')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('imgs/icones/favicon.ico') }}" type="image/x-icon">
        <style type="text/css">
            @font-face {
                font-family: 'vila madalena';
                font-size  : 18px;
                src        : url("{{ asset('/fonts/vila madalena.otf') }}");
            }

            #martelo.paused {
                animation-play-state: paused;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>PrettusKlan Siga</title>
    </head>

    <nav style="padding-right:15px; padding-top:0px;" class="py-4">
        <a href="{{ asset('/') }}">
            <button id="fechar"
                class="retorna w-12 h-12 flex items-center justify-center 
                       bg-green-500 hover:bg-red-500 
                       text-white font-bold rounded fechar">
                    &times;
            </button>
        </a>
    </nav>

    <center>
    <div class="divTitulo"></div>
        <header class="grid grid-cols-2 items-center gap-4 mt-10 pt-10 pb-5 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2"></div>

            @if (Route::has('login'))
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <!-- Botão do usuário -->
                <button id="usuario"
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                        rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1
                        transition"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-controls="dropdown-menu"
                    role="button">
                    
                    {{ Auth::user()->name }}

                    <svg class="ms-2 h-5 w-5 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div x-show="open"
                    @click.away="open = false"
                    x-transition
                    id="dropdown-menu"
                    class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white
                            shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu"
                    aria-labelledby="usuario">
                   
                    <div class="py-1">
                    <a href="{{ route('listar.perfis') }}"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100"
                    role="menuitem">P e r f i l</a>

                    @role('admin')
                    <a href="{{ route('pnladmin.index') }}"
                    class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                    role="menuitem">
                       ⚙️ Painel Administrativo
                    </a>
                    @endrole

                    <a href="{{ route('password.request') }}"
                    class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-gray-100"
                    role="menuitem">
                        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        &nbsp;&nbsp;&nbsp;Esqueceu senha
                    </a>

                    <hr class="my-1 border-gray-100">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="group flex w-full items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100 hover:text-red-500"
                                role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                &nbsp;&nbsp;&nbsp;Sair
                        </button>
                    </form>
                </div>
                
            </div>
            @endif
        </header>

        <main class="mt-[-20px] pb-2" style="margin-top:-50px paddibg-botom:5px;">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8" style="padding-left:5%">

                <div id="docs-card" style="width:90%"
                    class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6
                    shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                    transition duration-300 hover:text-black/70 hover:ring-black/20
                    focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10">
                    
                    <div id="screenshot-container" class="relative">
                        <img
                            src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"
                            alt="sistema integrado gerenciamento administrativo"
                            class="mx-auto h-40 rounded-[10px] object-cover"
                            onerror="
                                document.getElementById('screenshot-container').classList.add('!hidden');
                                document.getElementById('docs-card').classList.add('!row-span-1');
                                document.getElementById('docs-card-content').classList.add('!flex-row');
                                document.getElementById('background').classList.add('!hidden');"
                            />


                    </div>

                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                        <a  href="{{ route('processos.listar') }}" style="width:98%" class="flex items-start gap-4 rounded-lg
                            bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                            transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none
                            focus-visible:ring-[#FF2D20] lg:pb-10" >
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <img src="{{ asset('imgs/juridico/martelo.gif') }}">
                            </div>
                            <h2 class="text-xl font-semibold text-black">Processos</h2>
                            <p class="mt-2 text-sm/relaxed">Processos Cadastrados no Sistema</p>
                            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                        </a>
                    </div>

                </div>

                <a  href="dashboard/cadastros/pessoas" style="width:90%"
                    class="flex items-start gap-4 rounded-lg bg-white p-6
                    shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                    transition duration-300 hover:text-black/70 hover:ring-black/20
                    focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <img src="{{ asset('imgs/sistema/ca.png') }}">
                    </div>
                    <div class="pt-3 sm:pt-5">
                        <h3 class="text-xl font-semibold text-black">Registros</h3>
                            <p class="mt-2 text-sm/relaxed">
                                Cadastros de Dados do Sitema.
                            </p>
                    </div>
                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

                <a  href="dashboard/textos" style="width:90%"
                    class="flex items-start gap-4 rounded-lg bg-white p-6
                    shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                    transition duration-300 hover:text-black/70 hover:ring-black/20
                    focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"/>
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <img id="martelo" src="{{ asset('imgs/juridico/justica-01.png') }}">
                    </div>
                    <div class="pt-3 sm:pt-5">
                        <h2 class="text-xl font-semibold text-black">Textos Jurídicos</h2>
                        <p class="mt-2 text-sm/relaxed">
                            Textos Jurídocos do Sistema
                        </p>
                    </div>
                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

                <a href="{{ url('dashboard/agenda') }}" 
                    style="width:90%"
                    class="flex items-start gap-4 rounded-lg bg-white p-6
                            shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                            transition duration-300 hover:text-black/70 hover:ring-black/20
                            focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">

                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                            <img id="att_logo" src="{{ asset('imgs/icones/img1.png') }}" style="max-width:90%">
                        </div>

                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black">Agenda, Compromissos e Trabalhos</h2>
                            <p class="mt-2 text-sm/relaxed">Agenda do Sistema</p>
                        </div>

                        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                        </svg>
                </a>

                <a  href="dashboard/fincontri" style="width:90%"
                    class="flex items-start gap-4 rounded-lg bg-white p-6
                    shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                    transition duration-300 hover:text-black/70 hover:ring-black/20
                    focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"/>
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <img id="att_logo" src="{{ asset('imgs/icones/img2.png') }}" style="max-width:90%">
                    </div>
                    <div class="pt-3 sm:pt-5">
                        <h2 class="text-xl font-semibold text-black">Fiscal, Contábil e Tributário</h2>
                        <p class="mt-2 text-sm/relaxed">
                            Cadastros Lançamentos
                        </p>
                    </div>
                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

            </div>
        </main>

        <script type="module">
            $(document).ready(function(){
                const gif = document.getElementById('martelo');
                const button = document.getElementById('pauseButton');

                button.addEventListener('click', () => {
                    gif.classList.toggle('paused');
                    button.textContent = gif.classList.contains('paused') ? 'Retomar' : 'Pausar';
                });

	            $("#att_logo").click(function(){
                    $(this).toggleClass('rotate-image');
                });

                $(function() {
                    $('.toggle-button').click(function() {
                        $('.usuario-menu').toggleClass('show');
                    });
                });

            });

        </script>

    </section>
    </center>
</html>
<script src="{{ asset('js/alpine.js') }}" defer></script>
