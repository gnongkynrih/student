<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Misc;
use Razorpay\Api\Api;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdmissionPayment;

class AdmissionPaymentController extends Controller
{
    public function create(){
        try{
            $misc = Misc::first();
        $amount = $misc->admission_form_fee;
        $applicant = Applicant::find(session('applicant_id'));
        
        //craete order id
        $orderData = [
            'amount'          => $amount * 100, //  rupees in paise
            'currency'        => 'INR'
        ];
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        //generates the order_id ffrom razor pay
        $razorpayOrder = $api->order->create($orderData);
        $order_id = $razorpayOrder->id;
        $payment = AdmissionPayment::create([
                    'applicant_id' => session('applicant_id'), //session('applicant_id'
                    'admission_user_id' => session('admission_user_id'),
                    'academic_year' => Carbon::now()->year,
                    'status' => 'pending',
                    'amount' => $amount,
                    'order_id' => $order_id
                ]);
        session(['order_id' => $order_id]);
        return view('admissionpayment.create',compact('amount','applicant','order_id'));
        }catch(Exception $e){
            return back()->with('errorMessage',$e->getMessage());
        }
    }
    public function processPayment(Request $request){
        
        if (!empty($request->razorpay_payment_id)) {
            try {
                $razorpaymentId = $request->razorpay_payment_id;
                $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
                $response = $api->payment->fetch($razorpaymentId);
                $payment = AdmissionPayment::where('order_id',session('order_id'))->first();
                if($payment != null){
                    $payment->status = 'success';
                    $payment->r_payment_id = $razorpaymentId;
                    $payment->save();
                }
                
                session(['payment_id' => $razorpaymentId]);
                return redirect()->route('admissionpayment.razorthankyou')
                ->with('successMessage','Payment successful');
            } catch (Exception $e) {
                return back()->with('errorMessage',$e->getMessage());
            }
        }else{
            return back()->with('errorMessage',$e->getMessage());
        }
       
    }
    
    public function RazorThankYou()
    {
        $payment = AdmissionPayment::where('r_payment_id',session('payment_id'))->first();
        return view('admissionpayment.thankyou',compact('payment'));
    }
    
    public function downloadReceipt($id)
    {   
        $payment = AdmissionPayment::where('r_payment_id',$id)->first();
        $data = [
            'name' => $payment->applicant->fullname,
            'amount' => $payment->amount,
            'payment_id' => $payment->r_payment_id,
            'admission_to_class' => $payment->applicant->class_name,
            'status' =>'success',
            'date' => $payment->created_at,
        ];
        $pdf = PDF::loadView('admissionpayment.receipt',$data);
        return $pdf->download('receipt.pdf');
    }

    public function verifyPayment($id){
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $response = $api->order->fetch($id)->payments();
        dd($response);
    }
    public function downloadForm($id){
        $applicant = Applicant::find($id);
        $form = [
            'name' => $applicant->fullname,
            'dob' => $applicant->dob,
            'religion' => $applicant->religion->name,
            'passport' => $applicant->passport,
        ];
        $pdf = PDF::loadView('admissionpayment.applicationform',$form);
        return $pdf->download('applicationform.pdf');
    }
}
