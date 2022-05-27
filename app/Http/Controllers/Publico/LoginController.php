<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\{Hash, Validator, Auth};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('public.post.index');
    }

    public function login_index() {
        return view('Public.Login');
    }

    public function login_store(Request $request) {

        $rules = [
            'email'           => 'required|min:12|max:60|email|exists:users,email',
            'password'        => 'required|min:8|max:20',

        ];
        $messages = [
            'email.required'           => 'Ingresa tu correo',
            'email.exists'             => 'Tu correo no existe',
            'email.email'              => 'Tu correo no es valido',
            'email.min'                => '12 caracteres como minimo',
            'email.max'                => '60 caracteres como maximo',

            'password.required'        => 'Introduce una contraseña',
            'password.min'             => '8 caracteres como minimo',
            'password.max'             => '20 caracteres como maximo',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error en los siguientes campos');
        else:
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => '1'])):
                return redirect()->route('public.login.store');
            else:
                return back()->with('error','Error, Usuario Suspendido');
            endif;
        endif;
    }

    public function register_index() {
        return view('Public.Register');
    }
    Public function register_store(Request $request){

        $rules = [
            'name'                     => 'required|min:3|max:10',
            'email'                    => 'required||min:12|max:60|email|unique:users,email',
            'password'                 => 'required|min:8|max:20',
        ];

        $messages = [
            'name.required'            => 'Ingresa tu nombre',
            'name.min'                 => '3 caracteres como minimo',
            'name.max'                 => '10 caracteres como maximo',

            'email.required'           => 'Ingresa tu correo',
            'email.email'              => 'Tu correo no es valido',
            'email.unique'             => 'Este correo, se encuentra registrado',
            'email.min'                => '12 caracteres como minimo',
            'email.max'                => '60 caracteres como maximo',

            'password.required'        => 'Introduce tu contraseña',
            'password.min'             => '8 caracteres como minimo',
            'password.max'             => '20 caracteres como maximo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error, al guardar los campos');
        else:
            $user           = new User;
            $user->status   = '1';
            $user->image    = '/img/logo.png';
            $user->name     = e($request->input('name') .'-'.Str::random(5));
            $user->email    = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            $user->save();
            $data = "2";
            $user->roles()->attach($data);
        endif;

        return redirect()->route('public.login.index')->with('success','usuario creado con exito');
    }
}
