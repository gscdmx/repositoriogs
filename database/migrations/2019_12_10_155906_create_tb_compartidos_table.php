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
            $table->text('nombre_archivo')->nullable();
            $table->tinyInteger('estatus')->default(0);
            $table->integer('id_user_subio')->nullable();
            $table->integer('user_compartio')->nullable();    
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
