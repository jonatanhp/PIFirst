<?php

namespace App\Http\Controllers;
use App\Models\Docente;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Docente as DocenteResource;

class DocenteController extends BaseController
{
    public function index()
    {
        $docentes = Docente::all();
    
        return $this->sendResponse(DocenteResource::collection($docentes), 'Docentes retrieved successfully.');
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
            'cod_docente' => 'required',
            'nom_docente' => 'required',
            'pat_docente' => 'required',
            'mat_docente' => 'required',
            'dni_docente' => 'required',
            'email_docente' => 'required',
            'tel_docente' => 'required',
            'sexo_docente' => 'required',
            'f_nac_docente' => 'required'
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $docente = Docente::create($input);
   
        return $this->sendResponse(new DocenteResource($docente), 'Docente created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);
  
        if (is_null($docente)) {
            return $this->sendError('Docente not found.');
        }
   
        return $this->sendResponse(new DocenteResource($docente), 'Docente retrieved successfully.');
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
    public function update(Request $request, Docente $docente)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'cod_docente' => 'required',
            'nom_docente' => 'required',
            'pat_docente' => 'required',
            'mat_docente' => 'required',
            'dni_docente' => 'required',
            'email_docente' => 'required',
            'tel_docente' => 'required',
            'sexo_docente' => 'required',
            'f_nac_docente' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $docente->cod_docente = $input['cod_docente'];
        $docente->nom_docente = $input['nom_docente'];
        $docente->pat_docente = $input['pat_docente'];
        $docente->mat_docente = $input['mat_docente'];
        $docente->dni_docente = $input['dni_docente'];
        $docente->email_docente = $input['email_docente'];
        $docente->tel_docente = $input['tel_docente'];
        $docente->sexo_docente = $input['sexo_docente'];
        $docente->f_nac_docente = $input['f_nac_docente'];
        $docente->save();
   
        return $this->sendResponse(new DocenteResource($docente), 'Docente updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
   
        return $this->sendResponse([], 'Docente deleted successfully.');
    }
    

}