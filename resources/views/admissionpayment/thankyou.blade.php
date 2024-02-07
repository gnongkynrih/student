@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <article class="bg-secondary mb-3 col-md-6">  
  <div class="card-body text-center">
    <h4 class="text-white">Thank you for payment<br></h4>
    <table class="table table-bordered table-responsive">
        <tr>
          <th>Admission to class</th>
          <td>{{ $payment->applicant->class_name }}</td>
        </tr>
        <tr>
          <th>Full Name</th>
          <td>{{ $payment->applicant->fullname }}</td>
        </tr>
        <tr>
          <th>Admission Form Fee</th>
          <td>{{$payment->amount}}</td>
        </tr>
        <tr>
          <th>Payment ID</th>
          <td>{{$payment->r_payment_id}}</td>
        </tr>
        <tr>
          <th>Payment Date</th>
          <td>{{$payment->created_at}}</td>
        </tr>
        <tr>
          <th>Payment Status</th>
          <td>{{$payment->status}}</td>
        </tr>
      </table>
    <form action="{{route('admissionpayment.downloadreceipt',$payment->r_payment_id)}}" method="get">
    @csrf
      <button class="btn btn-warning"> Download Receipt  <i class="fa fa-download "></i></button> 
    </form>
  </div>
  <br><br><br>
</article>
  </div>
</div>
@endsection