<?php
  
namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
   
class Docente extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cod_docente' => $this->nom_provincia,
            'nom_docente' => $this->departamento_id,
            'pat_docente' => $this->nom_provincia,
            'mat_docente' => $this->nom_provincia,
            'dni_docente' => $this->nom_provincia,
            'email_docente' => $this->nom_provincia,
            'tel_docente' => $this->nom_provincia,
            'sexo_docente' => $this->nom_provincia,
            'f_nac_docente' => $this->nom_provincia,
            
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}