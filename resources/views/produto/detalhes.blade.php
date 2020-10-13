@extends('layout/principal')

@section('conteudo')

  <h1>Detalhes do produto: {{ $p->nome }}</h1>

  <ul>
    <li>
      <strong>Valor: </strong> R$ {{ $p->valor }}
    </li>
    <li>
      <strong>Descrição: </strong> {{ $p->descricao or 'Nenhuma descrição informada' }}
    </li>
    <li>
      <strong>Quantidade em estoque: </strong> {{ $p->quantidade }}
    </li>
  </ul>

@stop

