<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Departamento as DepartamentoResource;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
    
        return $this->sendResponse(DepartamentoResource::collection($departamentos), 'Departamentos retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nom_dep' => 'required'
            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $departamento = Departamento::create($input);
   
        return $this->sendResponse(new DepartamentoResource($departamento), 'Departamento created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);
  
        if (is_null($departamento)) {
            return $this->sendError('Departamento not found.');
        }
   
        return $this->sendResponse(new DepartamentoResource($departamento), 'Departamento retrieved successfully.');
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
    public function update(Request $request, Departamento $departamento)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nom_dep' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $departamento->nom_dep = $input['nom_dep'];
        
        $departamento->save();
   
        return $this->sendResponse(new DepartamentoResource($departamento), 'Departamento updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
   
        return $this->sendResponse([], 'Departamento deleted successfully.');
    }
    

}
