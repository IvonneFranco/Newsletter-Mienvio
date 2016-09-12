<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout');
    }

    public function store(Request $request)
    {
        $respuesta =Usuario::all()->get();
        return $respuesta;
       /* $email =$request->email;
        $password =$request->password;

        $rawSql = DB::table('usuario')
            ->select(['email', 'password'])
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();
       return $rawSql;*/
       /*$user= DB::table('usuario')
            ->join('usuariosroles', function ($join) {
                $join->on('usuarios.idUsuarios', '=', 'usuariosroles.idUsuarios')
                    ->where('usuariosroles.idRol', '=', 1);
            })
            ->get();*//*
        //return $request ->email . $request->password;
        $result = Usuario
            ::join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'contacts.phone', 'orders.price')
            ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
            ->get();*/


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
