<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;
use Request;

class ProdutoController extends Controller
{
	public function lista()
	{
		//$produtos = DB::select('SELECT * FROM produtos');
		$produtos = Produto::all();

		return view('produto/listagem')->with('produtos', $produtos);
	}

	public function listaJSON()
	{
		//$produtos = DB::select('SELECT * FROM produtos');
		$produtos = Produto::all();

		return response()->json($produtos);
	}

	// retorna uma view com os detalhes
	public function mostra($id)
	{
		// busca no banco um registro específico com id = $id
		//$produto = DB::select('SELECT * FROM produtos WHERE id = ?', [$id]);
		$produto = Produto::find($id);

		if (empty($produto)) {
			return "Esse produto não existe";
		}

		// return view('produto/detalhes')->with('p', $produto[0]);
		return view('produto/detalhes')->with('p', $produto);
	}

	public function novo()
	{
		return view('produto/formulario');
	}

	public function adiciona(ProdutosRequest $request)
	{
		Produto::create($request->all());

		return redirect()
			->action('ProdutoController@lista')
			->withInput(Request::only('nome'));
	}

	public function editar($id) {
		$produto = Produto::find($id);

		return view('produto/editar')->with('p', $produto);
	}

	public function alterar(ProdutosRequest $request, $id) {
		Produto::find($id)->update($request->all());

		return redirect()->action('ProdutoController@lista');
	}

	public function remove($id) {
		$produto = Produto::find($id);

		$produto->delete();

		return redirect()->action('ProdutoController@lista');
	}
}
