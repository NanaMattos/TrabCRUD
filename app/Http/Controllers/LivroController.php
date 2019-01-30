<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    public function create (Request $request){
	    $livros = new Livro;
	    $livros->titulo = $request->titulo;
	    $livros->autor = $request->autor;
	    $livros->editora = $request->editora;
	    $livros->versao = $request->versao;
	    $livros->anoDeLancamento = $request->anoDeLancamento;
	    $livros->qtdEstoque = $request->qtdEstoque;
	    $livros->qtdEmprestado = $request->qtdEmprestado;
	    $livros->save();
	    return response()->json([$livros]);
	}
	public function list (){
		return Livros::all();
	}
	public function show($id){
		$livros = Livros::findOrFail($id);
		return response ()->json([$livros]);
	}
	public function update(Request $request, $id){
		$livro = Livro::findOrFail($id);
		if($request->titulo)
			$livro->titulo = $request->titulo;
		if($request->autor)
			$livro->autor = $request->autor;
		if($request->editora)
			$livro->editora = $request->editora;
		if($request->versao)
			$livro->versao = $request->versao;
		if($request->anoDeLancamento)
			$livro->anoDeLancamento = $request->anoDeLancamento;
		if($request->qtdEstoque)
			$livro->qtdEstoque = $request->qtdEstoque;
		if($request->qtdEmprestado)
			$livro->qtdEmprestado = $request->qtdEmprestado;
		$livro->save();
		return response ()->json([$livro]);
	}
	public function destroy($id)
    {
        Livro::destroy($id);
        return response ()->json(['DELETADO']);
    }
}
