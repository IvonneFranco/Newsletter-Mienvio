<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariosroles', function (Blueprint $table) {
            $table->increments('idUsuarioRol');
            $table->integer('idUsuario')->unsigned();
            $table->integer('idRol')->unsigned();

            // Relaciones con las otras tablas:
            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
            $table->foreign('idRol')->references('idRol')->on('roles');
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
        Schema::drop('usuariosroles');
    }
}
