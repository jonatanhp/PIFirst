<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable=[
        'cod_docente',
        'cod_docente',
        'cod_docente',
        'cod_docente',
        'cod_docente',
        'cod_docente',
        'cod_docente',
        'cod_docente',
    ];

    //Relación uno a muchos para con Curso-docente
    public function curso_docentes(){
        return $this->hasMany('App\Models\Curso_docente');
    }
}
