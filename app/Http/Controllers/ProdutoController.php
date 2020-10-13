<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

	public function adiciona()
	{
		$validator = Validator::make(
			['nome' => Request::input('nome')],
			['nome' => 'required|min:5']
		);

		if ($validator->fails()) {
			return redirect()->action('ProdutoController@novo');
		}

		// $params = Request::all();
		// $produto = new Produto($params);
		Produto::create(Request::all());

		// $produto->nome = Request::input('nome');
		// $produto->descricao = Request::input('descricao');
		// $produto->valor = Request::input('valor');
		// $produto->quantidade = Request::input('quantidade');

		// $produto->save();

		return redirect()
			->action('ProdutoController@lista')
			->withInput(Request::only('nome'));
	}

	public function remove($id) {
		$produto = Produto::find($id);

		$produto->delete();

		return redirect()->action('ProdutoController@lista');
	}
}
