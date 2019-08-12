<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbRepositoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_repositorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre_archivo')->nullable();
            $table->text('descripcion')->nullable();
            $table->tinyInteger('estatus')->default(0);
            $table->integer('id_user_subio')->nullable();
            $table->date('fecha')->nullable();

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
        Schema::dropIfExists('tb_repositorios');
    }
}
