<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Comida extends Model
{
    use HasFactory;

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'comida', 'id');
    }
}
