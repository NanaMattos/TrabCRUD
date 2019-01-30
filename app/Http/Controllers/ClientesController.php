<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CLiente;

class ClientesController extends Controller
{
	public function create (Request $request){
	    $clientes = new Cliente;
	    $clientes->nome = $request->nome;
	    $clientes->telefone = $request->telefone;
	    $clientes->dataDeNascimento = $request->dataDeNascimento;
	    $clientes->endereco = $request->endereco;
	    $clientes->cpf = $request->cpf;
	    $clientes->save();
	    return response ()->json([$clientes]);
	}


}
