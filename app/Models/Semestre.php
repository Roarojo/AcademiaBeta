<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'semestre',
        'profesor_id',
        'materia_id'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','profesor_id');
    }

    public function materias(){
        return $this->hasOne(Materias::class, 'id','materia_id');
    }


    

    
}
