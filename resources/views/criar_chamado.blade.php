@extends('layout.layout')
@section('content')
<div class="flex flex-col h-full w-full p-8">
    <h1>ABRIR UM NOVO CHAMADO</h1>
    <p class="pb-4">Campos marcados com * são obrigatórios e devem ser preenchidos.</p>
    <form id="form" action="/novo-chamado" method="POST" class="bg-white flex flex-col p-8">
        @csrf
        <div class="flex flex-row">
            <div class="flex flex-col w-1/2">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*'] ...">Título</span>
                <input class="border p-2 mb-4 placeholder:text-gray-500 placeholder:italic border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md " 
                        type="text" 
                        name="titulo" 
                        id="titulo" 
                        placeholder="Informe o título do chamado" 
                        required>
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*'] ...">Descrição</span>
                <textarea class="border  p-2 placeholder:text-gray-500 placeholder:italic border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md mb-4" 
                        name="descricao" 
                        id="descricao" 
                        cols="30" 
                        rows="10" 
                        placeholder="Descreva o problema com o máximo de informações possíveis..." 
                        required></textarea>
                
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*'] ...">Categoria</span>
                <select class="border border-gray-300 rounded-sm p-2" name="categoria" id="categoria">
                    <option value="">Selecione uma categoria</option>
                    <option value="sistema">Sistema</option>
                    <option value="computador">Computador</option>
                    <option value="perifericos">Periféricos</option>
                    <option value="internet">Internet</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('form');
                    const categoriaSelect = document.getElementById('categoria');

                    form.addEventListener('submit', function(event) {
                        if (categoriaSelect.value === '') {
                            event.preventDefault();
                            alert('Por favor, selecione uma categoria para o chamado.');
                            categoriaSelect.focus();
                        }
                    });
                });
            </script>

            <div class="flex flex-col w-1/2">
                
                <span class="text-gray-700">Prazo de solução</span>
                <input class="mb-4 border border-gray-300 rounded-sm p-2" type="date" value="{{ $dataPrazo }}" name="prazoSolucao" id="prazoSolucao" readonly>

                <span class="text-gray-700">Situação</span>
                <select class="mb-4 border border-gray-300 rounded-sm p-2" name="situacao" id="situacao">
                    <option value="novo">Novo</option>
                </select>

                <span class="text-gray-700">Data de criação</span>
                <input class="mb-4 border border-gray-300 rounded-sm p-2" type="date" value="{{ $dataCriacao }}" name="dataCriacao" id="dataCriacao" readonly>

                <span class="text-gray-700">Data de solução</span>
                <input class="border border-gray-300 rounded-sm p-2" type="date" name="dataSolucao" id="dataSolucao" readonly>
            </div>
        </div>
        <button 
            type="submit" 
            class="mt-4 w-1/4 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 
                    focus:ring-purple-300 font-medium 
                    rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900
                    hover:cursor-pointer">Abrir chamado</button>
</div>
@endsection