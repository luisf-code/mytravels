<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Planes;

class LoginController extends Controller
{
    public function uploadFile( Request $request ){
    $files = $request -> file('files');
    $imgs = '';
    if( $files ):
        foreach( $files AS $key => $value ):
            $token = $this -> randomToken( 5, 15 );
            $imgName = $token.'-'.$value->getClientOriginalName();
            $value->move( env('UPLOADFILE_PATH'), $imgName );
            $imgs .= '"'.$imgName.'",';
        endforeach;

        // $query = new Planes(); guardar la informacion en la base de datos, aca irian los inputs de la base de datos
        // $query -> save();

        return redirect('/upload')->with(['msg' => 'Archivos subidos correctamente']);
    else:

        return redirect('/upload')->with(['msg' => 'No se ha subido ningun archivo']);

    endif;}
    public function uploadForm()
    {
        return view('admin.upload');
    }

    public function dashboard()
    {
        $html = '';
        $html .= '<h1>Bienvenid@ '.Auth::user() -> email.'</h1>';
        // $html .= '<h1>Bienvenid@ '.Auth::user() -> name.'</h1>'; -> mostras los campos que queramos de la base de datos
        $html .= '<br><a href="'.url('logout').'">Salir</a>';
        $html .= '<br><a href="'.url('upload').'">Subir archivos</a>';

        return $html;
    }

    public static function logout( Request $request )
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with(['msg' => 'Sesión cerrada correctamente']);
    }

    public static function login( Request $request )
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)):

            $request->session()->regenerate();
            return redirect()->intended('dashboard');

        endif;

        return redirect('login')->with(['msg' => 'Error en el usuario y/o contraseña']);
    }
    public function loginForm()
    {
        return view('admin.login');
    }

    public function register( Request $request )
    {
        $query = new User();

        $varEmail = $request -> input('email');
        $varName = $request -> input('name');
        $varPassword = $request -> input('password');

        if(isset($varEmail) and isset($varName) and isset($varPassword)){
            $query -> email = $request -> input('email');
            $query -> name = $request -> input('name');
            $query -> password = Hash::make( $request -> input('password') );
            $query -> save();
            return redirect('/login')->with(['msg' => 'Registro creado correctamente']);
        }else{
            return view('error');
        }


    }
    public static function registerForm(  )
    {
        return view('admin.register');
    }

    private static function randomToken( $start = 5, $end = 60 )
	{
		return substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), $start, $end);
	}
}
