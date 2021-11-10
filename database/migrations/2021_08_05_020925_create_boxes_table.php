<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email');
            $table->string('direccion')->nullable();
            $table->string('direccion_altura')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('localidad_id')->unsigned()->nullable();
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->integer('provincia_id')->unsigned()->nullable();
            $table->integer('pais_id')->unsigned()->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('deleted_by')->references('id')->on('users');
            // $table->foreign('pais_id')->references('id')->on('geo_paises');
            // $table->foreign('provincia_id')->references('id')->on('geo_provincias');
            // $table->foreign('departamento_id')->references('id')->on('geo_departamentos');
            // $table->foreign('localidad_id')->references('id')->on('geo_localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}
