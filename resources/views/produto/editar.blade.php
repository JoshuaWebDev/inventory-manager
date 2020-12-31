@extends('layout.principal')

@section('conteudo')

<h1 class="text-center my-2 py-2">Alterar o Produto {{ $p->nome }}</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/produtos/alterar/{{ $p->id }}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" name="nome" class="form-control" value="{{ $p->nome }}" />
    </div>
    <div class="form-group">
        <label>Descrição do Produto</label>
        <input type="text" name="descricao" class="form-control" value="{{ $p->descricao }}" />
    </div>
    <div class="form-group">
        <label>Valor Unitário</label>
        <input type="text" name="valor" class="form-control" value="{{ $p->valor }}" />
    </div>
    <div class="form-group">
        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade" class="form-control"  value="{{ $p->quantidade }}" />
    </div>
    <button type="submit" class="btn btn-primary btn-block">
        Salvar Alterações
    </button>
</form>

@stop
