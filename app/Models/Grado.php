<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_grado',
        'nivel_id'
    ];

    //Relación uno a muchos inversa para con Nivel
    public function nivel(){
        return $this->belongsTo('App\Models\Nivel');
    }

    //Relación uno a muchos para con Seccion
    public function seccions(){
        return $this->hasMany('App\Models\Seccion');
    }
}
