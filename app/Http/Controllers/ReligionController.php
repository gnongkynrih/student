<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReligionResource;
use App\Http\Requests\CreateReligionRequest;

class ReligionController extends Controller
{
    public function select($id){
        //select * from religion where id = $id
        $religion = Religion::find($id);
        if($religion == null)
            return response()->json([
                "data" => "No records found"
            ], 404);
        else
            return response()->json([
                "data" => new ReligionResource($religion), 
            ], 201);
    }
    public function index(){
        //select * from religion
        $religions = Religion::all();
        return view('religion.index',compact('religions'));
    }
    public function create(){
        return view('religion.create');
    }
    public function store(CreateReligionRequest $req)
    {
        try{
            $religion = new Religion();
            $religion->name = $req->name;
            $religion->save();
            return redirect()->route('religion.index')
            ->with('successMessage','New Religion Added');
        }catch(Exception $e){
            
        }
    }
    public function edit($id){
        $religion = Religion::find($id);
        return view('religion.create',compact('religion'));
    }
    public function update(Request $request,Religion $religion)
    {
        try{
            $religion->name = $request->name;
            $religion->save();
            return redirect()->route('religion.index');
        }catch(Exception $e){
            
        }
    }  
    public function delete(Religion $religion)
    {
        try{
            $religion->delete();
            return redirect()->route('religion.index');
        }catch(Exception $e){
            
        }
    }
    
}
