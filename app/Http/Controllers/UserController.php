<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{

    public static $modal = true;
    public function closeModal(){
        var_dump(self::$modal);
        // self::$modal = false;
    }

    public function loginUser(){

        $EmailUsuario = request('email');
        $ContrasenaUsuario = request('password');

        $User = User::where('email' , $EmailUsuario)->where('password', $ContrasenaUsuario)->first();
        
        if(!$User)
            return "Porfavor deja de ser tan 🤡 gonza";
            
        Session::put('id', $User->id);
        return redirect('/')->with(['usuario'=>$User]);
    }

    public function listOneUser($idUser){
        $User = User::where('id' , $idUser)->first();

        return $User;
    }

    public function createUser(){
        $User = new User();

        $EmailUsuario = request('email');
        $NombreUsuario = request('nickname');
        $ContrasenaUsuario = request('password');

        $DatosUsuario = [
            'name' => $NombreUsuario,
            'email' => $EmailUsuario,
            'password' => $ContrasenaUsuario,
        ];

        $validator = Validator::make($DatosUsuario, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if(!$validator)
            return "gonzalo deja de ser tan 🤡 y registrate bien";

        $User-> email = $EmailUsuario;
        $User-> name = $NombreUsuario;
        $User-> password = $ContrasenaUsuario;

        $User->save();
        Session::put('id',$User->id);
        return redirect('/')->with(['usuario'=>$User]);
    }

    public function cerrarSesion(){
        Session::flush();
        redirect('/register');
    }
}
