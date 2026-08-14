@extends('../layouts.dashboard')

@push('styles')
<style>
    @font-face {
        font-family: 'vila madalena';
        src: url("{{ asset('/fonts/vila madalena.otf') }}");
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
    }

    .alert-message {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ebccd1;
        border-radius: 4px;
        color: #a94442;
        background-color: #f2dede;
    }
</style>
@endpush

@section('content')
<section class="container">
    <center>
    <a href="{{ url()->previous() }}">
        @if(session()->has('mensagem'))
          
            <div class="alert-message" role="alert">
                <pre>{{ session('mensagem') }}</pre>
                {{ \App\Classes\Datas::dataHora() }}
            </div>

            <div class="divTitulo">OOOps...</div>
            <div>Operação Não Realizada</div><br>

                <img width="300" src="{{ asset('imgs/sistema/sem_permissao.png') }}">
            
        @else
            
                <div class="alert-message" role="alert">
                    &nbsp;&nbsp;&nbsp;&nbsp;⚠️ Controle de Rotina &nbsp;&nbsp;&nbsp;&nbsp; 
                </div><br>
                <div>🔐 Operação Não Realizada</div>
            
        @endif
    </a>
    </center>
</section>
@endsection
