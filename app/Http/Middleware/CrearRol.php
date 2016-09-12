<?php

namespace App\Http\Middleware;

use App\Usuario;
use Closure;
use Illuminate\Support\Facades\Auth;

class CrearRol
{
    protected $hierarchy =[
        'admin' => 3,
        '999'   =>0
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $usuario = Auth::user()->idUsuario;
        $count = Usuario::where('idUsuario', $usuario)->
        wherehas('roles',function($query){
            $query->where('descripcion','admin');
        })->get();
        if($count != '[]')
        {
            $roles ='admin';
        }else{
            $roles ='999';

        }
        if($roles == 'admin'){
            return $next($request);
        }
        abort(404);

    }
}
