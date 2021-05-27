<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_seccion',
        'grado_id'
    ];


    
    //Relación uno a muchos inversa para con Grado
    public function grado(){
        return $this->belongsTo('App\Models\Grado');}

    //Relación uno a muchos para con Curso-docente
    public function curso_docentes(){
        return $this->hasMany('App\Models\Curso_docente');
    }
}
