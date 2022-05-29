<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash, Validator, Storage};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::select('id', 'status', 'name')
            ->orderBy('id', 'DESC')
            ->paginate(40);

            return view('Admin.User.Home', compact('users'));
    }

    public function create()
    {
        $roles = Role::select('id', 'name')
            ->where('status', '1')->get();

        return view('Admin.User.Create', compact('roles'));
    }

    public function store(Request $request)
    {

        $rules = [
            'status'        => 'required|in:1,2',
            'name'          => 'required|min:3|max:10',
            'email'         => 'required|min:12|max:60|email|unique:users,email',
            'password'      => 'required|min:8|max:20',
            'roles'         => 'required',
            'image'         => 'required|image|mimes:jpeg,jpg,jpe,png|max:5120',
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'name.required'         => 'Ingresa tu nombre',
            'name.min'              => '3 caracteres como minimo',
            'name.max'              => '20 caracteres como maximo',

            'email.required'        => 'Ingresa tu correo',
            'email.email'           => 'Tu correo no es valido',
            'email.unique'          => 'Este correo, se encuentra registrado',
            'email.min'             => '12 caracteres como minimo',
            'email.max'             => '60 caracteres como maximo',

            'password.required'     => 'Introduce tu contraseña',
            'password.min'          => '8 caracteres como minimo',
            'password.max'          => '20 caracteres como maximo',

            'roles.required'        => 'Marca tu rol',

            'image.required'        => 'Seleccione una imagen',
            'image.image'           => 'No es una imagen',
            'image.mimes'           => 'Formatos permitidos JPEG JPG JPEG PNG WEBP',
            'image.max'             => '5mb como maximo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al guardar los datos');
        else:
            $user              = new User();
            $user->status      = $request->input('status');

            if($request->hasFile('image')){

                $image = $request->file('image');
                $image_new = Str::random(20) . $image->getClientOriginalName();
                $ruta = storage_path() . '/app/public/post/';
                $request->image->move($ruta, $image_new);
                $user->image    = '/storage/post/' . $image_new;
            }

            $user->name        = $request->input('name');
            $user->email       = $request->input('email');
            $user->password    = Hash::make($request->input('password'));
            $user->save();

            $user->roles()->attach($request->get('roles'));

        endif;
        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Usuario creado con éxito');
    }

    public function edit($id)
    {
        $roles = Role::where('status', '1')
        ->select('id', 'name')
        ->get();

        $user = User::find($id);

        return view('Admin.User.Edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        //return $request;
        $rules = [
            'status'        => 'required|in:1,2',
            'name'          => 'required|min:3|max:10',
            'email'         => "required|min:12|max:60|email|unique:users,email,$id",
            'roles'         => 'required',
            'image'         => 'image|mimes:jpeg,jpg,jpe,png|max:5120',
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'name.required'         => 'Ingresa tu nombre',
            'name.min'              => '3 caracteres como minimo',
            'name.max'              => '20 caracteres como maximo',

            'email.required'        => 'Ingresa tu correo',
            'email.email'           => 'Tu correo no es valido',
            'email.unique'          => 'Este correo, se encuentra registrado',
            'email.min'             => '12 caracteres como minimo',
            'email.max'             => '60 caracteres como maximo',

            'roles.required'        => 'Marca tu rol',

            'image.image'           => 'No es una imagen',
            'image.mimes'           => 'Formatos permitidos JPG JPEG PNG WEBP',
            'image.max'             => '5mb como maximo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al actualizar los datos');
        else:
            $user              = User::find($id);
            $user->status      = $request->input('status');

            $user->name        = $request->input('name');
            $user->email       = $request->input('email');
            if($request->password){
                $user->password   = Hash::make($request->input('password'));
            }
            $user->save();

            if($request->hasFile('image')){

                $user = User::find($id, ['id', 'image']);
                $user_image = str_replace('storage', 'public', $user->image);
                Storage::delete($user_image);

                $image = $request->file('image');
                $image_new = Str::random(20) . $image->getClientOriginalName();
                $ruta = storage_path() . '/app/public/post/';
                $request->image->move($ruta, $image_new);
                $user->image    = '/storage/post/' . $image_new;
                $user->save();
            }

            $user->roles()->sync($request->get('roles'));

        endif;
        return back()->with('success', 'Publicación actuaizada con éxito');
    }

    public function destroy($id)
    {

        $user = User::find($id, ['id', 'image']);
        $user_image = str_replace('storage', 'public', $user->image);
        Storage::delete($user_image);
        $user->delete();

        return back()->with('success', 'Publicación eliminada con éxito');
    }
}
