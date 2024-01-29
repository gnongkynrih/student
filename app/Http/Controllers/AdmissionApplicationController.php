<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\Applicant;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\AdmissionUser;
use App\Services\UtilityService;
use App\Services\AdmissionService;
use App\Http\Requests\ParentInfoRequest;
use App\Http\Resources\ReligionResource;
use App\Http\Resources\ClassInfoResource;
use App\Http\Requests\PersonalInfoFormRequest;
use App\Http\Requests\DocumentTypeCheckRequest;

class AdmissionApplicationController extends Controller
{
    protected $admissionService;
    protected $utilService;
    public function __construct(
        AdmissionService $service,
        UtilityService $utilService){
        $this->admissionService = $service;
        $this->utilService = $utilService;
    }

    public function show($id){
        $applicant = Applicant::find($id);
        if($applicant == null){
            return response()->json([
                'message'=>'Applicant not found'
            ],404);
        }
        $applicant->religion_id = $applicant->religion->name;
        return response()->json([
            'data'=>$applicant,
            'message'=>'Applicant found'
        ],201);
    }
    public function getPersonalInfo(){
        session(['admission_user_id'=>1]);
        $categories = array('ST','GEN','OBC','SC','OTH');
        $religions =ReligionResource::collection(Religion::all());
        $admissiontoclass = ClassInfoResource::collection(ClassInfo::all());

        $states = array('1'=>'Meghalaya','2'=>'Assam','3'=>'Arunachal Pradesh','4'=>'Nagaland','5'=>'Manipur','6'=>'Mizoram','7'=>'Tripura','8'=>'Sikkim');
        return view('admission.personal',compact(
            'categories','religions','states','admissiontoclass'));
    }
    public function personal(PersonalInfoFormRequest $request){
        try{
            if(session('admission_user_id') == null){
                return redirect()->route('admission.personal')->with('errorMessage','Your session has expired. Please login again');
            }
            // $userExist = AdmissionUser::checkUserExist($request->admission_user_id);
            // if($userExist == false ){
            //     return redirect()->route('admission.personal')->with('errorMessage','Your session has expired. Please login again');
            // }
            $check = Applicant::checkIfAlreadyApplied(
                session('admission_user_id'),
                $request->first_name,
                $request->class_name
            );
            if($check ==true){
                return $this->utilService->jsonResponse(
                    null,
                    'You have already applied for this class',
                    404
                );
                
            }
            $applicant =$this->admissionService->save($request->validated());
            $applicant_id = $applicant->id;
            session(['applicant_id'=>$applicant_id]);
            return redirect()->route('admission.parents');
        }catch(Exception $e){
            return response()->json([
                'message'=>'Applicant cannot be created'
            ],404);
        }
    }
    public function editpersonal(){
        $applicant = Applicant::find(session('applicant_id'));
        $categories = array('ST','GEN','OBC','SC','OTH');
        $religions =ReligionResource::collection(Religion::all());
        $admissiontoclass = ClassInfoResource::collection(ClassInfo::all());

        $states = array('1'=>'Meghalaya','2'=>'Assam','3'=>'Arunachal Pradesh','4'=>'Nagaland','5'=>'Manipur','6'=>'Mizoram','7'=>'Tripura','8'=>'Sikkim');
        
        return view('admission.personal',compact('applicant',
        'categories','religions','states','admissiontoclass'));
    }
    public function family(){
        return view('admission.family');
    }
    public function parentsInfo(ParentInfoRequest $request){
        $userExist = AdmissionUser::checkUserExist($request->admission_user_id);
        if($userExist == false ){
            return response()->json([
                'message'=>'User does not exist'
            ],404);
        }
        $applicant =$this->admissionService->updateParentInfo($request->validated(),$request->applicant_id);
        return response()->json([
            'data'=>$applicant,
            'message'=>'record updated'
        ],201);
    }
    public function uploadDocuments(DocumentTypeCheckRequest $request){
        try{
            $res = $this->admissionService->uploadDocuments($request);
            return response()->json([
                'data'=>$res,
                'message'=>'Documents uploaded'
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
            ],404);
        }
    }
    public function submit(Request $request){
        try{
            $res = $this->admissionService->submit($request->applicant_id);
            if($res=="error"){
                return response()->json([
                    'message'=>'Application not submitted'
                ],404);
            }else if($res=="applied"){
                return response()->json([
                    'message'=>'You have already applied'
                ],404);
            }else{
                //send email about successful application
                return response()->json([
                    'data'=>$res,
                    'message'=>'Application submitted'
                ],201);
            }
        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
            ],404);
        }
    }
}
