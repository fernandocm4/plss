@extends('layout.layout')
@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div>
    <table>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Data de criação</th>
            <th>Prazo de solução</th>
            <th>Data de solução</th>
            <th>Situação</th>
        </tr>
        @foreach($chamado as $key)
            <tr>
                <td><a class="hover:underline" href="/chamados/{{ $key->id }}">{{ $key->titulo }}</a></td>
                <td>{{ $key->descricao }}</td>
                <td>{{ $key->categoria->titulo_categoria }}</td>
                <td>{{ \Carbon\Carbon::parse($key->data_criacao)->format('d/m/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($key->prazo_solucao)->format('d/m/Y')}}</td>
                <!-- VERIFICA SE A DATA DE SOLUÇÃO AINDA NÃO FOI DEFINIDA -->
                <td>
                    @if ($key->data_solucao)
                        {{ \Carbon\Carbon::parse($key->data_solucao)->format('d/m/Y') }}
                    @else
                        Não definida
                    @endif
                </td>
                <td>{{ $key->situacao->titulo_situacao }}</td>
            </tr>
        @endforeach
        
    </table>
    
</div>
@endsection