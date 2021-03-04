<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Comida;

class Pedido extends Model
{
    use HasFactory;

    public function cliente()
	{
    	return $this->belongsTo(Cliente::class, 'cliente', 'id');
	}

	public function comida()
	{
    	return $this->belongsTo(Comida::class, 'comida', 'id');
	}
}
