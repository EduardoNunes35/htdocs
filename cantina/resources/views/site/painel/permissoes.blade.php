@extends('layouts.siga')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <nav style="padding-right:5px;" class="py-2">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
    
    <h2 class="text-2xl font-bold mb-6">Painel de Papéis e Permissões</h2>
    </nav>
    <!-- Feedback -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Formulário para Atribuir Papel -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Atribuir Papéis a Usuários</h3>
            <form method="POST" action="{{ route('atribuir.role') }}">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium">Usuário</label>
                    <select name="user_id" id="user_id" class="w-full border rounded px-3 py-2">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Papéis</label>
                    <select name="roles[]" multiple class="w-full border rounded px-3 py-2">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar</button>
            </form>
        </div>

        <!-- Formulário para Atribuir Permissão -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Atribuir Permissões a Papéis</h3>
            <form method="POST" action="{{ route('atribuir.permissao') }}">
                @csrf
                <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium">Papel</label>
                    <select name="role_id" id="role_id" class="w-full border rounded px-3 py-2">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Permissões</label>
                    <select name="permissions[]" multiple class="w-full border rounded px-3 py-2">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
