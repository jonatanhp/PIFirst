<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Curso as CursoResource;

class CursoController extends BaseController
{
    public function index()
    {
        $cursos = Curso::all();
    
        return $this->sendResponse(CursoResource::collection($cursos), 'Cursos retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'cod_curso' => 'required',
            'nom_curso' => 'required',
            'nota_max' => 'required',
            'num_horas_p' => 'required',
            'num_horas_np' => 'required',
            'estado_curso' => 'required',
            'area_id' => 'required'
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $curso = Curso::create($input);
   
        return $this->sendResponse(new CursoResource($curso), 'Curso created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
  
        if (is_null($curso)) {
            return $this->sendError('Curso not found.');
        }
   
        return $this->sendResponse(new CursoResource($curso), 'Curso retrieved successfully.');
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'cod_curso' => 'required',
            'nom_curso' => 'required',
            'nota_max' => 'required',
            'num_horas_p' => 'required',
            'num_horas_np' => 'required',
            'estado_curso' => 'required',
            'area_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $curso->cod_curso = $input['cod_curso'];
        $curso->nom_curso = $input['nom_curso'];
        $curso->nota_max = $input['nota_max'];
        $curso->num_horas_p = $input['num_horas_p'];
        $curso->num_horas_np = $input['num_horas_np'];
        $curso->estado_curso = $input['estado_curso'];
        $curso->area_id = $input['area_id'];
        $curso->save();
   
        return $this->sendResponse(new CursoResource($curso), 'Curso updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
   
        return $this->sendResponse([], 'Curso deleted successfully.');
    }
    

}