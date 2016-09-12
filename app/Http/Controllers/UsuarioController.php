<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Usuario as Usuario;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Auth;

class UsuarioController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('auth.login');
    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);

    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect('cliente');
        }

        return redirect('login');

    }
    public function nombre(Request $request)
    {
        $usuario = Auth::Usuario();
        $email = $usuario->email;
        $password = $usuario->password;
        dd($email.' '. $password);


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;
        $user = new Usuario();
        $user->nombre   = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->email    = $data['email'];
        $user->password = bcrypt($data['password']);

        if ($user->save()) {
            return redirect('login');
        }
    }
}
