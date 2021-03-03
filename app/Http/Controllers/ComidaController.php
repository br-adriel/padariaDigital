<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comidas = Comida::all();
        return view('administrador.comidas.index', ['comidas'=>$comidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comida = new Comida;

        $comida->nome       = $request->nome;
        $comida->tag        = $request->tag;
        $comida->preco      = $request->preco;
        $comida->descricao  = $request->descricao;

        $comida->save();

        return redirect()->route('comidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comida = Comida::find($id);
        return view('administrador.comidas.edit', ['comida'=>$comida]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comida = Comida::find($id);

        $comida->nome       = $request->nome;
        $comida->descricao  = $request->descricao;
        $comida->preco      = $request->preco;
        $comida->tag        = $request->tag;

        $comida->save();

        return redirect()->route('comidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comida = Comida::find($id);
        $comida->delete();

        return redirect()->route('comidas.index');
    }
}
