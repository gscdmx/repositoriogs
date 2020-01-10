<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCompartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_compartidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_archivo')->nullable();
            $table->integer('id_user_compartio')->nullable();
            //no necesarios
            $table->integer('id_user_subio')->nullable();
            $table->tinyInteger('estatus')->default(0); 
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
        Schema::dropIfExists('tb_compartidos');
    }
}
