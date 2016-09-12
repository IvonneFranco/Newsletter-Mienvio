<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey ='idRol';
    protected $fillable = ['descripcion'];

    public function usuario()
    {
        return $this->belongsToMany('App\Usuario', 'usuariosroles','idRol','idUsuario');

    }

    protected function id($query, $q)
    {
        $rol=Rol::wherehas('usuario',function($query){
            $query->where('nombre','=', 'dos');
        })->get();

       return $rol;

    }



}
