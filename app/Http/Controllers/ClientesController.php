<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ClientesController extends Controller
{
    //método que contiene los clientes
    public function traerclientes(Request $request)
    {
        $asunto = $request->asunto;
        $select = Input::get('ch');
        foreach($select as $t){
            $this->haceremail($t,$asunto);
        }

    }
    //método envía multiples correos
    public function haceremail($select,$asunto)
    {
        $selectencontrado = $select;
        $user   = Usuario::firstOrNew(['registration_token' => $selectencontrado]);
        $email  = $user->email;
        $codigo = $user->registration_token;

        Mail::send('generarboletin.boletin2', ['email' => $email,'asunto' => $asunto,'codigo' => $codigo],
            function ($m) use ($email,$asunto) {
                $m->to($email);
                $m->subject($asunto);
            });
    }
    public function bajaboletin($codigo){

        return view('auth.bajaboletin',['codigo'=> $codigo]);
    }

    public function confirmarbaja(Request $request, $codigo)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        $email = $request->email;
        $user= Usuario::firstOrNew(['registration_token' => $codigo]);
        $emailusuario = $user->email;

        if($emailusuario == $email){
            $id =$user->idUsuario;

            $editarusuario = Usuario::findOrFail($id);

            $editarusuario->fill([
                'status' => 'no'
            ]);
            $editarusuario->save();
            dd($editarusuario);

        }
        dd('error de correo');

    }


}
