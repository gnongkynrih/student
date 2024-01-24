<?php

namespace App\Http\Controllers;

use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Http\Requests\ClassInfoRequest;
use App\Http\Resources\ClassInfoResource;

class ClassInfoController extends Controller
{
    public function index(){
        $classInfo = ClassInfo::where('is_active','=','Y')->get();
        return view('classinfo.index',compact('classInfo'));
        
    }
    public function insert(){
        return view('classinfo.insert');
    }
    public function create(ClassInfoRequest $request){
        try{
            $classInfo = new ClassInfo();
            $classInfo->name = $request->name;
            $classInfo->save();
            return redirect()->route('classinfo.index')
            ->with('successMessage','New Class Detail Added Successfully');
        }catch(Exception $e){
            
        }
    }
    public function edit($id){
        $classInfo = ClassInfo::find($id);
        return view('classinfo.insert',compact('classInfo'));
    }
    public function update(Request $request,ClassInfo $classInfo)
    {
        try{
            
            $classInfo->name = $request->name;
            $classInfo->is_active='Y';
            $classInfo->save();
            return redirect()->route('classinfo.index');
        }catch(Exception $e){
            
        }
    }
    public function delete(ClassInfo $clsinfo)
    {
        try{
            
            $clsinfo->is_active='N';
            $clsinfo->save();
            return redirect()->route('classinfo.index');
        }catch(Exception $e){
            
        }
    }
    
}
