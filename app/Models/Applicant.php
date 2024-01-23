<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    //generate the uuid for the id field whenever we add a new record
    public static function booted(){
        static::creating(function($applicant){
            $applicant->id = (string) Str::uuid();
        });
    }
    public function religion(){
        return $this->belongsTo(Religion::class);
    }
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y'); 
    }
    static public function checkIfAlreadyApplied($userid,$name,$cls): bool{
        $applicant = Applicant::where('admission_user_id','=',$userid)
        ->where('first_name','=',$name)->where('class_name','=',$cls)->first();
        if($applicant){
            return true;
        }else{
            return false;
        }
    }
    
}
