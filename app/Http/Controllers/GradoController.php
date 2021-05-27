<?php

namespace App\Http\Controllers;
use App\Models\Grado;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Grado as GradoResource;

class GradoController extends BaseController
{
    public function index()
    {
        $grados = Grado::all();
    
        return $this->sendResponse(GradoResource::collection($grados), 'Grados retrieved successfully.');
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
            'nom_grado' => 'required',
            'nivel_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $grado = Grado::create($input);
   
        return $this->sendResponse(new GradoResource($grado), 'Grado created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::find($id);
  
        if (is_null($grado)) {
            return $this->sendError('Grado not found.');
        }
   
        return $this->sendResponse(new GradoResource($grado), 'Grado retrieved successfully.');
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
    public function update(Request $request, Grado $grado)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nom_grado' => 'required',
            'nivel_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $grado->nom_grado = $input['nom_grado'];
        $grado->nivel_id = $input['nivel_id'];
        $grado->save();
   
        return $this->sendResponse(new GradoResource($grado), 'Grado updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        $grado->delete();
   
        return $this->sendResponse([], 'Grado deleted successfully.');
    }
    

}