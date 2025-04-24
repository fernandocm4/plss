@extends('layout.layout')
@section('content')
<div class="p-8 flex flex-col h-full justify-center">
    <!--
    <div>
        <p>Todos chamados: {{ $todos }}</p>
        <p>Todos deste mes: {{ $chamadosMes }}</p>
        <p>Contagem dentro do prazo: {{ $dentroPrazo }}</p>
        <p>Porcentagem dentro do prazo: {{ $porcentagemPrazo }}%</p>
    </div>
    -->
    <div class="bg-white shadow-md rounded-sm p-8 flex flex-col justify-center items-center h-full">
        <h2 class="text-2xl pb-4">Total de chamados (mês atual)</h2>
        <h1 class="text-4xl pb-12">{{ $chamadosMes }}</h1>
        <h2 class="text-2xl pb-4">Chamados resolvidos dentro do prazo (mês atual)</h2>
        <!--<h1 class="text-4xl">{{ round($porcentagemPrazo) }}%</h1>-->
        <h1 class="text-4xl">{{ number_format($porcentagemPrazo, 2) }}%</h1>
    </div>
    
</div>
@endsection