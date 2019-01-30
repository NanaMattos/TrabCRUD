<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;
use App\Http\Resources\EmprestimoResource;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $emprestimos = new Emprestimo;
        $emprestimos->status = $request->status;
        $emprestimos->dataDeInicio = $request->dataDeInicio;
        $emprestimos->dataDeTermino = $request->dataDeTermino;
        $emprestimos->save();
        return new EmprestimoResource($emprestimos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $all = Emprestimo::all();
        return response ()->json([$all]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprestimos = Emprestimo::findOrFail($id);
        return EmprestimoResource::collection(Emprestimo::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
            $emprestimo = Emprestimo::findOrFail($id);
        if($request->status)
            $emprestimo->status = $request->status;
        if($request->dataDeInicio)
            $emprestimo->dataDeInicio = $request->dataDeInicio;
        if($request->dataDeTermino)
            $emprestimo->dataDeTermino = $request->dataDeTermino;
        if($request->idLivro)
            $emprestimo->idLivro = $request->idLivro;
        if($request->idCliente)
            $emprestimo->idCliente = $request->idCliente;
        $livro->save();
        return new EmprestimoResource($emprestimos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Emprestimo::destroy($id);
        return response ()->json(['DELETADO']);
    }
}
