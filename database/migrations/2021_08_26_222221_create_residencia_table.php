<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->comment('nombre de la residencia');
            $table->string('direccion', 100)->nullable()->comment('direccion de la residencia');;
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la residencia');
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
        Schema::dropIfExists('residencias');
    }
}
