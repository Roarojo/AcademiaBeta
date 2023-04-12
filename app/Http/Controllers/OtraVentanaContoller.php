<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OtraVentanaContoller extends Controller
{
  
    public function vincular(){
        $user = User::all();
        $mat = Materias::all();
        $sem = Semestre::all();
        return view('acceso',[
            'user' => $user,
            'mat' => $mat,
            'sem' => $sem
        ]);
    }

    public function mostrarperfil($user){
        
        $buser=User::find($user);
        //dd($buser);
       return view('perfil',compact('buser'));
    }

    public function eliminar(User $user){
       // dd('eliminar');
       $user->delete();
       return back()->with('mensaje','Eliminado');
    }


    public function editar(User $user){

       // dd('Editando');

       return redirect()->route('post.editar',$user);


    }
   
}
