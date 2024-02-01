<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Applicant;
use Illuminate\Support\Str;
use App\Models\ApplicationForm;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Storage;

class AdmissionService
{
    public function save($data){
      $data['admission_user_id'] = session('admission_user_id');
      return Applicant::create($data);
    }
    
    public function updateParentInfo($data,$studentid){
      return Applicant::updateOrCreate(['id'=>$studentid],$data);
    }

    protected function saveImage($request){
      $image = $request->file('image');
      $path = $image->store('admission/'.date("Y"), 'public');
      return $path;
    }
    public function uploadDocuments($request){
      try{
        $applicant = Applicant::find(session('applicant_id'));
        if($applicant == null){
          throw new \Exception('User detail not found');
        }
        $path = $this->saveImage($request);
        switch($request->source){
          case 'passport':
            $applicant->passport = $path;
            break;
          case 'birth_certificate':
            $applicant->birth_certificate = $path;
            break;
          case 'family_pic':
            $applicant->family_pic = $path;
            break;
          case 'baptism_certificate':
            $applicant->baptism_certificate = $path;
            break;
          case 'father_id':
            $applicant->father_id = $path;
            break;
          case 'mother_id':
            $applicant->mother_id = $path;
            break;
          case 'caste_certificate':
            $applicant->caste_certificate = $path;
            break;
          case 'address_proof':
            $applicant->address_proof = $path;
            break;

        }
        $applicant->save();
        $data = array(
          'path' =>Storage::url($path),
          'message' =>'ok'
        );
        return $data;
      }catch(Exception $e){
        $data = array(
          'message' =>'error'
        );
        return $data;
      }
    }
    public function submit($applicantId){
      $applicant = Applicant::where('id','=',$applicantId)->first();
      if($applicant == null){
        return 'error';
      }
      //check if user already applied
      if($applicant->app_no != null){
        return "applied";
      }
      //generate the application no
      $appno = new ApplicationForm();
      $appno->applicant_id = $applicantId;
      $appno->save();

      $applicant->app_no = $appno->id;
      $applicant->app_date = Carbon::now();
      $applicant->status = 'submitted';
      $applicant->save();
      return $appno->id;
    }
    public function checkRequiredDocuments($applicant){
      if($applicant->passport == null || $applicant->birth_certificate == null 
      || $applicant->family_pic == null || $applicant->baptism_certificate == null 
      || ($applicant->father_id == null && $applicant->mother_id == null)){
        return false;
      }
      return true;
    }
}