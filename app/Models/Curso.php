<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable=[
        'cod_curso',
        'nom_curso',
        'nota_max',
        'num_horas_p',
        'nom_horas_np',
        'estado_curso',
        'area_id'
    ];

    //Relación de uno a muchos inversa para con Area
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    //Relación de uno a muchos para con Curso-docente
    public function curso_docentes(){
        return $this->hasMany('App\Models\Curso_docente');
    }
}
