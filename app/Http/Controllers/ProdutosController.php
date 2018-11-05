<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produtos::all();
        return view('produtos.index', compact('produtos'));

    }

    public function show($id){
        $produto = Produtos::find($id);
        return view('produtos.show', compact('produto'));
    }

    public function create(){
        return view('produtos.create');
    }

    public function store(Request $request){

        $msg = [
            'sku.required' => 'O número é obrigatório',
            'titulo.required' => 'O titulo é obrigatório',
            'descricao.required' => 'A descrição é obrigatório',
            'preco.required' => 'O preço é obrigatório',

        ];

        $request->validate([
            'sku' => 'required|unique:produtos|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric'
        ], $msg);

        $produto = new Produtos();
        $produto->sku = $request->input('sku');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($produto->save()){
            Session::flash('success', 'Produdo Cadastrado com Sucesso!');
            return redirect()->route('produtos.create');
        }

    }

    public function edit($id){
        $produto = Produtos::find($id);
        return view('produtos.edit', compact('produto', 'id'));
    }

    public function update(Request $request, $id){

        $produto = Produtos::find($id);

        $msg = [
            'titulo.required' => 'O titulo é obrigatório',
            'descricao.required' => 'A descrição é obrigatório',
            'preco.required' => 'O preço é obrigatório',

        ];

        $request->validate([
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric'
        ], $msg);

        if($request->hasFile('imgProduto')){
            $imagem = $request->file('imgProduto');
            $nomeArquivo = md5($id).".".$imagem->getClientOriginalExtension();
            $request->file('imgProduto')->move(public_path('./img/produtos/'), $nomeArquivo);
        }

        $produto->sku = $request->input('sku');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($produto->save()){
            Session::flash('success', 'Produdo Alterado com Sucesso!');
            return redirect()->route('produtos.edit', $id);
        }

    }

    public function destroy($id){
        $produto = Produtos::find($id);

        if(file_exists("./img/produtos/".md5($id).".jpg")){
            unlink("./img/produtos/".md5($id).".jpg");
        }
        $produto->delete();

        Session::flash('success', 'Produdo foi apagado com sucesso!');
        return redirect()->route('produtos.index');
    }
}
