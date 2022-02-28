<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function edit(){
        $contraseña = User::all();
        return view('Vistas.editarperfil');
    }

    public function update(Request $request){
        $user = \Auth::user();
        $id =$user->id;

        // validar datos
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'apellido_p' => 'required|string',
            'apellido_m'=>'required|string',
            'nick'=> 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,

        ]);

        $name = $request->input('name');
        $apellido_p = $request->input('apellido_p');
        $apellido_m = $request->input('apellido_m');
        $nick = $request->input('nick');
        $email = $request->input('email');

        $user->name = $name;
        $user->apellido_p = $apellido_p;
        $user->apellido_m = $apellido_m;
        $user->nick = $nick;
        $user->email = $email;

                    $avatar = $request->file('avatar');
                    if($avatar){
                        $image = time().$avatar->getClientOriginalName();//nombre para guardar en la base de datos
                        Storage::disk('users')->put($image,File::get($avatar));//carpeta donde se guarda la imagen
                        $user->avatar = $image;
                    }

        $user->update();

        return redirect()->route('edit')->with(['message' => 'Cambios guardados']);

    }


    public function getAvatar($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}
