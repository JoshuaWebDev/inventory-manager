@extends('layout/principal')

@section('conteudo')

  @if ( empty ( $produtos ) )

    <div class="alert alert-danger">Não há produtos cadastrados!</div>

  @else

  <h1 class="text-center my-2 py-2">Produtos Cadastrados</h1>

  @if (old('nome'))
      <div class="alert alert-success">
          <p>O produto {{ old('nome') }} foi cadastrado com sucesso!</p>
      </div>
  @endif

  <table class="table table-striped table-bordered table-hover">
    <tbody>
      @foreach ($produtos as $p)
      <tr class="{{ $p->quantidade <= 1 ? 'alert alert-danger' : '' }}">
        <td> {{ $p->nome }} </td>
        <td> {{ $p->valor }} </td>
        <td> {{ $p->descricao }} </td>
        <td> {{ $p->quantidade }} </td>
        <td>
          <a href="{{action('ProdutoController@mostra', $p->id)}} ">
            <span class="glyphicon glyphicon-search">
              <img src="/img/glyphicons-28-search.png" title="Ver detalhes" alt="Ver detalhes" />
            </span>
          </a>
        </td>
        <td>
          <a href="{{action('ProdutoController@remove', $p->id)}} ">
            <span class="glyphicon glyphicon-trash">
              <img src="/img/glyphicons-17-bin.png" title="Apagar Registro" alt="Apagar Registro" />
            </span>
          </a>
        </td>
        <td>
          <a href="{{action('ProdutoController@editar', $p->id)}}">
            <span class="glyphicon glyphicon-edit">
              <img src="/img/glyphicons-151-edit.png" title="Alterar Registro" alt="Alterar Registro" />
            </span>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @endif

  <h4>
    <span class="alert alert-danger float-right">
      Um ou menos itens no estoque
    </span>
  </h4>

@stop
