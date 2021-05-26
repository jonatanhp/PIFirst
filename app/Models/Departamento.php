<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Departamento extends Model
{
    use HasFactory;

    //Campos editables en la base de datos
    protected $fillable=[
        'nom_dep'
    ];

    //Relación uno a muchos para con la tabla provincias
    public function provincias(){
        return $this->hasMany('App\Models\Provincia');
    }
}
