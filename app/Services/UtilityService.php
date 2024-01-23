<?php
namespace App\Services;

class UtilityService{
  public function jsonResponse($data,$message,$status){
    return response()->json([
      'data'=>$data,
      'message'=>$message
    ],$status);
  }
}