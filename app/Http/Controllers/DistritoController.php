<?php

namespace App\Http\Controllers;
use App\Models\Distrito;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Distrito as DistritoResource;

class DistritoController extends BaseController
{
    public function index()
    {
        $distritos = Distrito::all();
    
        return $this->sendResponse(DistritoResource::collection($distritos), 'Distritos retrieved successfully.');
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
            'nom_distrito' => 'required',
            'provincia_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distrito = Distrito::create($input);
   
        return $this->sendResponse(new DistritoResource($distrito), 'Distrito created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distrito = Distrito::find($id);
  
        if (is_null($distrito)) {
            return $this->sendError('Distrito not found.');
        }
   
        return $this->sendResponse(new DistritoResource($distrito), 'Distrito retrieved successfully.');
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
    public function update(Request $request, Distrito $distrito)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nom_distrito' => 'required',
            'provincia_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distrito->nom_distrito = $input['nom_distrito'];
        $distrito->provincia_id = $input['provincia_id'];
        $distrito->save();
   
        return $this->sendResponse(new DistritoResource($distrito), 'Distrito updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distrito $distrito)
    {
        $distrito->delete();
   
        return $this->sendResponse([], 'Distrito deleted successfully.');
    }
    

}