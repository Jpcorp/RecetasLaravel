<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->comment('nombre de la residencia');
            $table->date('fecha_pago');
            $table->date('fecha_vencimiento');
            $table->date('nmro_cliente');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la residencia');
            $table->foreignId('proveedor_id')->references('id')->on('proveedors')->comment('Proveedor de la cuenta');
            $table->foreignId('tipo_cuenta_id')->references('id')->on('tipo_cuentas')->comment('tipo de la ctas');
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
        Schema::dropIfExists('cuentas_proveedores');
    }
}
