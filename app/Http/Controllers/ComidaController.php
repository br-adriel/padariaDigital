<?php

namespace App\Http\Controllers;

use App\Models\Comida;
use Illuminate\Http\Request;

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
     * @param  \App\Models\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function show(Comida $comida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function edit(Comida $comida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comida $comida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comida $comida)
    {
        //
    }
}
