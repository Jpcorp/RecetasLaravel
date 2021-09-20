<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rut', 15);
            $table->string('direccion')->nullable();
            $table->string('tlf')->nullable();
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            $table->string('giro')->nullable();
            $table->string('descripcion')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('residencias_id')->references('id')->on('residencias');
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
        Schema::dropIfExists('proveedors');
    }
}
