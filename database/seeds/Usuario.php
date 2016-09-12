<?php

use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     *$table->increments('idUsuario');
    $table->string('nombre');
    $table->string('apellido');
    $table->string('email')->unique();
    $table->string('password', 60);
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<5;$i++)
        {

            Usuario::create(
                [
                    'nombre'=> "usuario$i",
                    'apellido'=> "apellido$i",
                    'email' => "email$i@test.com",
                    'password' => bcrypt("pass$i"),
                ]);
        }
    }
}
