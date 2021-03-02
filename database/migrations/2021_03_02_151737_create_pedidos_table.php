<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Chae estrangeira para comida
            $table->foreignId('comida');
            $table->foreign('comida')->references('id')->on('comidas')->onDelete('cascade');

            //Chave estrangeira para cliente
            $table->foreignId('cliente');
            $table->foreign('cliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('quantidade');
            $table->integer('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
