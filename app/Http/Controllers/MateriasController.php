<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
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


    public function mostrarmaterias($id){
        
        $ids = Semestre::query()
            ->where('profesor_id',request('id'))
            ->get();
        return view('materiasprofesor', compact('ids'));
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
        $request->validate([
            'name' => 'required',
            'clave' => 'required|unique:materias',
            'creditos' => 'required',
         ]);
         Materias::create([
            'materia' => $request->name,
            'clave' => $request->clave,
            'creditos' => $request->creditos,
            'HT' => $request->ht, 
            'HP' => $request->hp,
     ]); 

     /*$mat = Materias::all();
     return view('materias',compact("mat"));*/
     return redirect()->route('cargar.materias')->with('creado','Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mat = Materias::paginate(5);
        return view('materias',compact("mat"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materias $materias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materias)
    {
        //
    }
}
