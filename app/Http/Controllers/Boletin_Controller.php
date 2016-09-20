<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Boletin_Controller extends Controller
{
    /**
     * método que mostrará los clientes con status si
     * (status = si) sigmifica que unicamente los clientes que aceptaron
     * que se les envie correos.
     */
    public function index()
    {
        $users=Usuario::wherehas('roles',function($query){
            $query->where('descripcion','cliente')
                ->where('status','si');
        })->get();
        return view('cliente/boletin',compact('users'));

    }

    public function crearboletin()
    {
        return view('generarboletin/pruebaboletin');

    }
    public function enviarboletin()
    {
        return view('generarboletin/enviarboletin');

    }


}
