@extends('layout.layout')
@section('content')
<div class="w-full h-full p-8">
    <div class="bg-white shadow-md rounded-sm p-8 flex flex-row h-full items-center justify-center">
        <div class="flex flex-col w-1/2">
            <span class="text-gray-700">Título</span>
            <input class="border p-2 mb-4 placeholder:text-gray-500 placeholder:italic border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md " 
                    type="text" 
                    name="titulo" 
                    id="titulo" 
                    placeholder="Informe o título do chamado" 
                    required
                    value="{{ $chamado->titulo }}"
                    readonly>
            <span class="text-gray-700">Descrição</span>
            <textarea class="border  p-2 placeholder:text-gray-500 placeholder:italic border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md mb-4" 
                    name="descricao" 
                    id="descricao" 
                    cols="30" 
                    rows="10" 
                    required
                    readonly>{{$chamado->descricao}}</textarea>
            
            <span class="text-gray-700">Categoria</span>
            <select class="border border-gray-300 rounded-sm p-2" name="categoria" id="categoria">
                <option value="categoria">{{$chamado->categoria->titulo_categoria}}</option>
            </select>
        </div>
        <form action="{{ route('chamados.update', ['id' => $chamado->id]) }}" method="POST" class="bg-white flex flex-col p-8 w-1/2">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                        
                    <span class="text-gray-700">Situação</span>
                    <select class="mb-4 border border-gray-300 rounded-sm p-2" name="situacao" id="situacao">
                        <!--<option value="novo" {{ $chamado->situacao == 'novo' ? 'selected' : '' }}>Novo</option>
                        <option value="pendente" {{ $chamado->situacao == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="resolvido" {{ $chamado->situacao == 'resolvido' ? 'selected' : '' }}>Resolvido</option>-->
                        @foreach ($situacoes as $situacao)
                            <option value="{{ $situacao->id }}">{{ $situacao->titulo_situacao }}</option>
                        @endforeach
                    </select>

                    <div id="dataSolucaoContainer" class="flex-col">
                        <span class="text-gray-700">Data de solução</span>
                        <input class="border border-gray-300 rounded-sm p-2" type="date"  name="dataSolucao" id="dataSolucao" readonly>
                    </div>

                    
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const situacaoSelect = document.getElementById('situacao');
                        const dataSolucaoContainer = document.getElementById('dataSolucaoContainer');
                        const dataSolucaoInput = document.getElementById('dataSolucao');
                        

                        function toggleDataSolucaoVisibility() {
                            if (situacaoSelect.value === '3') {
                                dataSolucaoContainer.style.display = 'flex'; // ou 'flex', 'grid', dependendo do seu layout
                                dataSolucaoInput.value = '{{ now()->toDateString() }}';
                            } else {
                                dataSolucaoContainer.style.display = 'none';
                                dataSolucaoInput.value = null;
                            }
                        }
                        toggleDataSolucaoVisibility();
                        situacaoSelect.addEventListener('change', toggleDataSolucaoVisibility);
                    });
                </script>

                <button 
                    type="submit" 
                    class="mt-4 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 
                            focus:ring-purple-300 font-medium 
                            rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900
                            hover:cursor-pointer">Atualizar chamado</button>
                
        </form>
        <form action="{{ route('chamados.delete', ['id' => $chamado->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button 
                type="submit" 
                class="mt-4 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 
                        focus:ring-purple-300 font-medium 
                        rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900
                        hover:cursor-pointer">Excluir chamado</button>
        </form>
        
    </div>
</div>
@endsection