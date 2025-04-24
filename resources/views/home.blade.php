@extends('layout.layout')
@section('content')
<div class="p-8 flex flex-col h-full justify-center">
    <!--
    <div>
        <p>Todos chamados: {{ $todos }}</p>
        <p>Todos deste mes: {{ $todosmes }}</p>
        <p>Contagem atrasados: {{ $chamados }}</p>
        <p>Porcentagem atrasados: {{ $chamado }}%</p>
    </div>
    -->
    <div class="bg-white shadow-md rounded-sm p-8 flex flex-col justify-center items-center h-full">
        <h2 class="text-2xl pb-4">Total de chamados (mês atual)</h2>
        <h1 class="text-4xl pb-12">{{ $todosmes }}</h1>
        <h2 class="text-2xl pb-4">Chamados resolvidos após o prazo (mês atual)</h2>
        <h1 class="text-4xl">{{ $chamado }}%</h1>
    </div>
    
</div>
@endsection