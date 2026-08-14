@extends('layouts.dashboard')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Título --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Gerenciar Roles e Permissões
        </h1>
        <p class="text-md text-gray-600">
            Painel administrativo de controle de acessos
        </p>
    </div>

    {{-- Criar Role --}}
    <div class="bg-white shadow rounded-lg p-4 mb-8">
        <h2 class="text-lg font-semibold mb-3 text-gray-700">
            Criar nova role
        </h2>

        <form method="POST" action="{{ route('roles.store') }}" class="flex flex-col sm:flex-row gap-3">
            @csrf
            <input
                type="text"
                name="name"
                placeholder="Nome da role"
                class="w-full sm:w-64 border rounded-md px-3 py-2 text-sm
                       focus:ring focus:ring-blue-200 focus:outline-none"
                required
            >
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm
                       hover:bg-blue-700 transition"
            >
                Criar
            </button>
        </form>
    </div>

    {{-- Lista de Roles --}}
    <div class="bg-white shadow rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">
            Roles existentes
        </h2>

        <div class="space-y-5">
            @foreach($roles as $role)
                <div class="border rounded-lg p-8">

                    {{-- Header --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <span class="font-bold text-gray-600 text-2xl">
                            {{ $role->name }}
                        </span>

                        {{-- Remover Role --}}
                        <form
                            method="POST"
                            action="{{ route('roles.destroy', $role) }}"
                            onsubmit="return confirm('Deseja realmente remover esta role?')"
                        >
                            @csrf
                            @method('DELETE')
                           <button
                                type="submit"
                                style="background-color: #fecaca !important;" 
                                class="-mt-2 px-3 text-gray-700 hover:text-gray-900 text-sm font-medium rounded-md transition-colors flex items-center gap-1"
                            >
                                🗑 Remover role
                            </button>
                        </form>
                    </div>

                    
                    {{-- Atribuir Permissão --}}
                    <form
                        method="POST"
                        action="{{ route('roles.permission', $role) }}"
                        class="flex items-center gap-2 mt-6"  
                    >
                        @csrf

                        <select
                            name="permission"
                            class="-mt-2 w-full sm:w-auto h-9 border rounded-md px-2 text-sm
                                focus:ring focus:ring-green-200 focus:outline-none"
                        >
                            @foreach($permissions as $p)
                                <option value="{{ $p->name }}">{{ $p->name }}</option>
                            @endforeach
                        </select>

                        <button
                            type="submit"
                            class="-mt-2 w-full sm:w-auto h-9 bg-green-600 text-white px-6 rounded-md text-sm
                                hover:bg-green-700 transition"
                        >
                            Atribuir
                        </button>
                    </form>

                    {{-- Container Principal com largura máxima de 95% e centralizado --}}
                    <div class="mt-4 w-[95%] mx-auto">
                        <p class="text-lg font-medium text-gray-700 mb-2">
                            Permissões:
                        </p>

                        {{-- Grid: 1 col no mobile, 2 no tablet e 4 no desktop --}}
                        {{-- A classe gap-3 define o espaçamento entre as divs --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            @forelse($role->permissions as $permission)
                                {{-- Div específica por permissão com tamanho mínimo estabelecido (min-w) --}}
                                <div class="min-w-[150px] flex items-center justify-between px-3 py-2 bg-blue-100 rounded-sm border-blue-200 shadow-sm">
                                    
                                    {{-- Nome da Permissão com truncate para não quebrar a div --}}
                                    <span class="-mt-2 text-xs font-semibold text-blue-700 truncate mr-2">
                                        {{ $permission->name }}
                                    </span>

                                    {{-- Formulário de Remoção --}}
                                    <form
                                        method="POST"
                                        action="{{ route('roles.permission.remove', [$role, $permission]) }}"
                                        onsubmit="return confirm('Remover esta permissão?')"
                                        class="flex items-center bg-gray-100 hover:bg-gray-200 border-l border-blue-200 h-full p-2 transition-all"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="-mt-2 text-red-600 hover:text-red-800 font-bold text-sm leading-none transition-transform hover:scale-125"
                                            title="Remover"
                                        >
                                            ×
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <div class="col-span-full text-sm text-gray-400 italic">
                                    Nenhuma permissão atribuída.
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection