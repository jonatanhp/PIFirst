<?php

namespace App\Http\Controllers;
use App\Models\Provincia;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Provincia as ProvinciaResource;

class ProvinciaController extends BaseController
{
    public function index()
    {
        $provincias = Provincia::all();
    
        return $this->sendResponse(ProvinciaResource::collection($provincias), 'Provincias retrieved successfully.');
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
            'nom_provincia' => 'required',
            'departamento_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $provincia = Provincia::create($input);
   
        return $this->sendResponse(new ProvinciaResource($provincia), 'Provincia created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provincia = Provincia::find($id);
  
        if (is_null($provincia)) {
            return $this->sendError('Provincia not found.');
        }
   
        return $this->sendResponse(new ProvinciaResource($provincia), 'Provincia retrieved successfully.');
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
    public function update(Request $request, Provincia $provincia)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nom_provincia' => 'required',
            'departamento_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $provincia->nom_provincia = $input['nom_provincia'];
        $provincia->departamento_id = $input['departamento_id'];
        $provincia->save();
   
        return $this->sendResponse(new ProvinciaResource($provincia), 'Provincia updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();
   
        return $this->sendResponse([], 'Provincia deleted successfully.');
    }
    

}