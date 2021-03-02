<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanificadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panificadoras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('email', 50);
            $table->string('endereco', 70);
            $table->string('telefone', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panificadoras');
    }
}
