<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreinscripcionInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripcion_inscripcions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('preinscripcion_fecha_id');
            $table->integer('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('telefono');
            $table->string('instagram')->nullable();
            $table->string('horarios');
            $table->boolean('cambio_turno')->default(false);
            $table->boolean('activo')->default(false);

            $table->foreign('preinscripcion_fecha_id')->references('id')->on('preinscripcion_fechas')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('preinscripcion_inscripcions');
    }
}
