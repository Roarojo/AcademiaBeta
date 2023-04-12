<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemestreController extends Controller
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
                 
        $pro = DB::table('users')
        ->where('name',request('profesor'))
        ->get();
        $id_profesor = $pro[0]->id;
        //dd($id_profesor);
        $mat = DB::table('materias')
        ->where('materia',request('materia'))
        ->get();
        $id_materia = $mat[0]->id;
        //dd($id_materia);
        
     Semestre::create([
            'semestre' => $request->semestre,
            'profesor_id' => $id_profesor,
            'materia_id' => $id_materia,
     ]);

     return redirect()->route('cargar.semestre')->with('creado','Creado');
     
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        $sem = Semestre::paginate(5);
        $mat = Materias::all();
        $prof = User::all();
        return view('semestres',[
            'sem' => $sem,
            'mat' => $mat,
            'prof' => $prof
        ]);

        return view('semestres',compact('sem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Semestre $semestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        //
    }
}
