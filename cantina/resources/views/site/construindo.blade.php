@extends('layouts.dashboard')

@section('title', 'Módulo em Construção')

@push('styles')
    
    <style>
        @font-face {
            font-family: 'VilaMadalena';
            src: url("/fonts/vila madalena.otf");
        }

        .zoomable {
            transition: font-size .3s ease-out;
        }

        .zoomed {
            font-size: 60px !important;
            transition: font-size .6s ease-in;
        }

        .rotate-image {
            transform: rotate(360deg);
            transition: transform 1s ease;
        }
    </style>
    
@endpush

@section('content')

    <div class="w-full px-4 md:px-8 -mt-[50px] flex flex-col justify-center">

        <header class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-600">
                Sistema Módulo em Construção
            </h2>
        </header>

        <section class="w-[85%] mx-auto flex justify-center items-center min-h-[70vh]">
            <div class="bg-white shadow-xl rounded-xl p-8 text-center w-full max-w-xl">

                <h1 class="text-3xl font-bold text-blue-600 mb-4">
                    🚧 Módulo em Construção
                </h1>

                <p class="text-gray-600 mb-6">
                    Este módulo ainda está sendo desenvolvido.
                </p>

                <div class="bg-gray-50 border rounded-lg p-4 mb-6 text-gray-700">
                    <strong>Usuário:</strong>
                    {{ auth()->user()?->name ?? 'Visitante' }}
                </div>

                <!-- Botões -->
                <div class="flex flex-wrap justify-center gap-3 mb-6">
                    <button id="demo"
                        class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Abrir Demo
                    </button>

                    <button id="ajax"
                        class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Ajax Demo
                    </button>
                </div>

                <!-- Imagem -->
                <div class="mb-4 text-center">
                    <img id="img1"
                        src="{{ asset('imgs/sistema/trabalhando.gif') }}"
                        alt="Em desenvolvimento"
                        width="100"
                        class="mx-auto cursor-pointer">
                </div>

                <div class="text-lg text-gray-500 tracking-wide">
                    Desenvolvimento {{ \App\Classes\Datas::dataHora() }}
                </div>

                <!-- Zoom -->
                <div class="mt-10">
                    <button id="zoom"
                        class="zoomable bg-green-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg transition">
                        Animação Zoom
                    </button>
                </div>

                <!-- Modal -->
                <div class="mt-6">
                    <button
                        type="button"
                        class="rounded-lg px-6 py-2 text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white transition"
                        data-twe-toggle="modal"
                        data-twe-target="#sigaBackdrop">
                        Abrir Modal
                    </button>
                </div>

            </div>
        </section>
    </div>

    <!-- ================= MODAL ================= -->
    <div id="sigaBackdrop"
        data-twe-modal-init
        tabindex="-1"
        class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        aria-labelledby="sigaBackdropLabel"
        aria-hidden="true">

        <div data-twe-modal-dialog-ref  class="pointer-events-none relative mx-auto mt-24 w-[95%] max-w-xl translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out">

            <div class="pointer-events-auto flex flex-col bg-white rounded-xl shadow-xl w-[99%] mx-auto md:w-full md:max-w-4xl max-h-[85vh] -translate-y-[50px]">

                <!-- Header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <h5 class="text-xl font-bold" id="sigaBackdropLabel">
                        O Advogado Tributarista
                    </h5>
                    <button type="button"
                        data-twe-modal-dismiss
                        aria-label="Close"
                        class="text-gray-600 hover:text-red-500 text-lg">
                        ✕
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 overflow-y-auto text-justify leading-relaxed max-h-[70vh] max-w-[70vw]">

                    <h2 class="text-xl font-bold mb-2">
                        O Advogado Tributarista do Futuro
                    </h2>

                    <p><strong>Por <i>Edmilson Jhoaquim</strong></i></p>
                    <p class="mb-4 text-blue-600">
                        Direito + Tecnologia + Dados
                    </p>

                    <p class="mb-4">
                        O Direito Tributário brasileiro vive uma transformação histórica.
                        A Reforma Tributária redefine o papel do advogado tributarista.
                    </p>

                    <p class="mb-4">
                        O mercado mudou — e o profissional que não acompanhar essa mudança
                        ficará à margem das novas demandas.
                    </p>

                    <h3 class="font-bold mt-4">O Novo Jurista</h3>

                    <ul class="my-4 space-y-2">
                        <li>📌 Direito Tributário aplicado à Reforma</li>
                        <li>📌 Perícia Digital e análise de dados fiscais</li>
                        <li>📌 Automação de rotinas e conformidade</li>
                    </ul>

                    <p class="font-bold mt-6">Competências Essenciais:</p>

                    <div class="space-y-2 mt-2 bg-gray-50 p-3 rounded border">
                        <p>✅ Domina tributos sobre consumo</p>
                        <p>✅ Utiliza scripts e automações (SPED, EFD)</p>
                        <p>✅ Trabalha com bancos de dados e cloud</p>
                        <p>✅ Aplica IA para gerar peças e riscos</p>
                    </div>

                    <div class="border-t pt-4 mt-6 text-sm text-gray-500">
                        📧 edjo90@yahoo.com | OAB/SP 2**.6**
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-2 p-4 border-t">
                    <button data-twe-modal-dismiss
                        class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Fechar
                    </button>

                    <button id="salvar"
                        class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Salvar
                    </button>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const btn1 = document.getElementById("demo");
    const btn2 = document.getElementById("ajax");

    if (btn1) {
        btn1.addEventListener("click", function () {
            alert("Botão Demo Abrir !");
        });
    }
    if (btn2) {
        btn2.addEventListener("click", function () {
            alert("Botão Ajax Abrir !");
        });
    }

    if (typeof $ === "undefined") {
        console.error("jQuery ainda não carregou.");
        return;
    }

    $("#zoom").on("click", function () {
        $(this).toggleClass("zoomed");
    });

    $("#img1").on("click", function () {
        $(this).toggleClass("rotate-image");
    });

});
</script>
@endpush