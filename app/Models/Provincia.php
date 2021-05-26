<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_provincia',
        'departamento_id'
    ];

    //Relación uno a muchos inversa para con departamento
    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    //Relación uno a muchos para con distrito
    public function distritos(){
        return $this->hasMany('App\Models\Distrito');
    }
}
