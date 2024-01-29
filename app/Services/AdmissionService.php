<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Applicant;
use Illuminate\Support\Str;
use App\Models\ApplicationForm;
use Carbon\Exceptions\Exception;

class AdmissionService
{
    public function save($data){
      $data['admission_user_id'] = session('admission_user_id');
      return Applicant::create($data);
    }
    
    public function updateParentInfo($data,$studentid){
      return Applicant::updateOrCreate(['id'=>$studentid],$data);
    }

    protected function saveImage($imageSource,$request){
      $image = $request->file($imageSource);
      $path = $image->store('admission/'.date("Y"), 'public');
      return $path;
    }
    public function uploadDocuments($request){
      try{
        $applicant = Applicant::find($request->id);
        if($applicant == null){
          throw new \Exception('User detail not found');
        }
        if ($request->hasFile('passport')) {
            $applicant->passport = $this->saveImage('passport',$request);
        }
        if ($request->hasFile('family_pic')) {
            $applicant->family_pic = $this->saveImage('family_pic',$request);
        }
        if ($request->hasFile('baptism_certificate')) {
            $applicant->baptism_certificate = $this->saveImage('baptism_certificate',$request);
        }
        if ($request->hasFile('father_id')) {
            $applicant->father_id = $this->saveImage('father_id',$request);
        }
        if ($request->hasFile('mother_id')) {
            $applicant->mother_id = $this->saveImage('mother_id',$request);
        }
        if ($request->hasFile('caste_certificate')) {
            $applicant->caste_certificate = $this->saveImage('caste_certificate',$request);
        }
        if ($request->hasFile('birth_certificate')) {
          $applicant->birth_certificate = $this->saveImage('birth_certificate',$request);
        }
        if ($request->hasFile('address_proof')) {
          $applicant->address_proof = $this->saveImage('address_proof',$request);
        }
        $applicant->save();
        return true;
      }catch(Exception $e){
        return false;
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
}