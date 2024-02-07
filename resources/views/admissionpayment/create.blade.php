@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="card col-md-6">
      <h5>Make Payment</h5>

      <table class="table table-bordered table-responsive">
        <tr>
          <th>Admission to class</th>
          <td>{{ $applicant->class_name }}</td>
        </tr>
        <tr>
          <th>Full Name</th>
          <td>{{ $applicant->fullname }}</td>
        </tr>
        <tr>
          <th>Admission Form Fee</th>
          <td>{{$amount}}</td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>
            <form action="{{ route('admissionpayment.processpayment') }}" method="POST" >
                @csrf 
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZOR_KEY') }}"
                        data-amount="{{$amount*100}}"
                        data-buttontext="Complete Payment"
                        data-name="{{$applicant->fullname}}"
                        order_id = "{{ $order_id}}"
                        data-description="Admission form fee payment"
                        data-image="https://www.laravelia.com/storage/logo.png"
                        data-prefill.name="{{$applicant->fullname}}"
                        data-prefill.email="{{$applicant->email}}"
                        data-theme.color="#ff7529">
                </script>
            </form>
          </th>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection