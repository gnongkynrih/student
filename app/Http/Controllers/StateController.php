<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Http\Requests\CreateReligionRequest;

class StateController extends Controller
{
    public function index(){
        $states = State::all();
        if($states->isEmpty())
            return response()->json([
                "data" => "No records found"
            ], 404);
        else
            return response()->json([
                "data" => StateResource::collection($states), 
            ], 201);
    }
    public function insert(CreateReligionRequest $request){
        try{
            // $validate = $request->validate([
            //     'name'=>'required|string|max:40|min:3|unique:states,name',
            // ]);
            $state = new State();
            $state->name = $request->name;
            $state->save();
            return response()->json([
                "data" => $state, 
                "message" => "State record created"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "State record not created"
            ], 404);
        }
    }
    public function update(CreateReligionRequest $request,State $state)
    {
        try{
            // $validate = $request->validate([
            //     'name'=>'required|string|max:40|min:3|unique:states,name',
            // ]);
            $state->name = $request->name;
            $state->save();
            return response()->json([
                "data" => $state->name, 
                "message" => "Record updated successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "State record not updated"
            ], 404);
        }
    }
    public function destroy(State $state)
    {
        try{
            
            $state->delete();
            return response()->json([
                "data" => $state->name, 
                "message" => "Record deleted successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "State record not deleted"
            ], 404);
        }
    }
}
