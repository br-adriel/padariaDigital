<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panificadora;

class PanificadoraController extends Controller
{
    public function edit() {
    	$panificadora = Panificadora::find(1);

    	return view('administrador.empresa', ['panificadora'=>$panificadora]);
    }


    public function update(Request $request) {
    	$panificadora = Panificadora::find(1);

    	$panificadora->email 	= $request->email;
    	$panificadora->endereco = $request->endereco;
    	$panificadora->telefone = $request->telefone;
    	$panificadora->save();

    	return redirect()->route('panificadoras.edit');
    }
}
