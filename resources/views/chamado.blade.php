@extends('layout.layout')
@section('content')
<div class="w-full h-full p-8">
    <div class="bg-white shadow-md rounded-sm p-8 flex flex-row h-full items-center justify-center">
        <div>
            <h1>{{ $chamado->id }}</h1>
            <h1>{{ $chamado->titulo }}</h1>
            <h1>{{ $chamado->descricao }}</h1>
            <h1>{{ $chamado->categoria }}</h1>
            <h1>{{ $chamado->situacao }}</h1>
        </div>
        <form action="{{ route('chamados.update', ['id' => $chamado->id]) }}" method="POST" class="bg-white flex flex-col p-8 w-1/2">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                        
                    <span class="text-gray-700">Situação</span>
                    <select class="mb-4 border border-gray-300 rounded-sm p-2" name="situacao" id="situacao">
                        <option value="novo" {{ $chamado->situacao == 'novo' ? 'selected' : '' }}>Novo</option>
                        <option value="pendente" {{ $chamado->situacao == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="resolvido" {{ $chamado->situacao == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
                    </select>

                    <span class="text-gray-700">Data de solução</span>
                    <input class="border border-gray-300 rounded-sm p-2" type="date" min="{{ now()->toDateString() }}" name="dataSolucao" id="dataSolucao">
                </div>
                <button 
                    type="submit" 
                    class="mt-4 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 
                            focus:ring-purple-300 font-medium 
                            rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900
                            hover:cursor-pointer">Abrir chamado</button>
        </form>
    </div>
</div>
@endsection