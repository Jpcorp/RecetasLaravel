<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la residencia');
            $table->foreignId('cuenta_proveedores_id')->references('id')->on('cuentas_proveedores')->comment('Cuenta proveedor de la transaccion');
            $table->date('fecha_pago');
            $table->integer('monto');
            $table->string('rectificatoria')->nullable();
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
        Schema::dropIfExists('transacciones');
    }
}
