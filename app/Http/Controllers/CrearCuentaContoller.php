<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrearCuentaContoller extends Controller
{
	
    public function crearDatos(Request $request){

        //dd('datos obtenidos');
        $request->validate([
            'name'=>'required|max:30',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:3'
        ]);
        $persona = 'Admin';
        //dd('Usuario creado');
        //Esto es igual que si escribieramos INSERT INTO Usuarios...
        User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make( $request->password ),
               'rol' => $persona
        ]);   
        
        
     /*   auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/

        //otra forma de autentificar cuando se crea la cuenta

        //auth()->attempt($request->only('email','password'));
        
        //return redirect()->route('post.index');

       // return redirect()->route('post.index')->with('creado','Creado');

       return redirect()->route('mostrar.profesor')->with('creado','Creado');
       
     }
    
    
    public function mostrarDatos(){
        //dd('acceso');
        return view('crear');
   }
}
