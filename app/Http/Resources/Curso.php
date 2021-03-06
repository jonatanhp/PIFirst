<?php
  
namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
   
class Curso extends JsonResource
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
            'cod_curso' => $this->cod_curso,
            'nom_curso' => $this->nom_curso,
            'nota_max' => $this->nota_max,
            'num_horas_p' => $this->num_horas_p,
            'num_horas_np' => $this->num_horas_np,
            'estado_curso' => $this->estado_curso,
            'area_id' => $this->area_id,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}