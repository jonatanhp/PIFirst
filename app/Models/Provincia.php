<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa para con Departamento

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }
}
