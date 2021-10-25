<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaFiscalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_fiscals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operacao');
            $table->string('natureza_operacao');
            $table->string('modelo');
            $table->integer('finalidade');
            $table->integer('ambiente');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')
              ->references('id')
              ->on('pedidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_fiscals');
    }
}
