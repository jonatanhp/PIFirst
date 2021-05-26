<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_distrito',
        'provincia_id'
    ];

    //Relación uno a muchos inversa para con Provincia
    public function provincia(){
        return $this->belongsTo('App\Models\Provincia');
    }

    //Relación uno a muchos para con alumno
    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
}
