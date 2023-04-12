<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function editarperfil($user){

        dd($user);


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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  $request->validate([
            'name'=>'required|max:30',
            'perfil'=>'required|max:30',
        ]);

        if ($request->hasFile('image')){
            Professor::create([
                'name' => $request->name,
                'foto' => $request->file('image')->store('imagenes','public'),
                'perfil' =>$request->perfil,
            ]);
        }else{
            Professor::create([
                'name' => $request->name,
                'perfil' =>$request->perfil,
            ]);
        }    

            return back()->with('creado','Creado');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pro = User::all();
        return view('professor',compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($professor)
    {
      //  dd($professor);
      // $prof = Professor::find($professor);
       // return view('mostrarprofesor',compact('prof'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $professor)
    {

       // dd($professor);
      /*  $prof = Professor::find($professor);
        $prof -> name = $request->name;
        if ($request->hasFile('image')){
            if ($prof->foto===NULL){

            }else{
                Storage::disk('public')->delete($prof->foto);
            }
            
            $prof -> foto = $request->file('image')->store('imagenes','public');
        }
        $prof->perfil = $request->perfil;
        $prof->save();
        return redirect()->route('post.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    
    /*public function destroy( Professor $prof)
    {
       // dd('Eliminar profesor');
        if ($prof->foto===NULL){
            $prof->delete();
        }else{
            $prof->delete();
            Storage::disk('public')->delete($prof->foto);
        }
        return back()->with('mensaje','eliminado');
       
    }*/
}
