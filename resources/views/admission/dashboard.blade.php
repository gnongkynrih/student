@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h4>Dasboard</h4>
      <a href="{{route('admission.personal')}}" class="btn btn-primary mb-5"><i class="fa-solid fa-plus"></i>  Apply for new admission</a>
      <div class="row g-4">
        @foreach($applicants as $a)
          <div class="card col-md-4">
            <div class="card-body">
              <div class="card-title">Name: {{$a->fullname}} </div>
              <p class="card-text">Admission to class {{ $a->class_name }}</p>
            </div>
            <div class="card-footer">
              <form action="{{route('admission.editpersonal', [$a->id])}}" method="get">
              @csrf
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
              </form>
              
            </div>
          </div>
        @endforeach
      </div>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Payment History
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th>Download</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($payments as $p)
                    <tr>
                      <td>{{$p->applicant->fullname}}</td>
                      <td>{{$p->applicant->class_name}}</td>
                      <td>{{$p->amount}}</td>
                      <td>{{$p->created_at}}</td>
                      <td>{{$p->r_payment_id ?? ''}}</td>
                      <td>
                        @if($p->status == 'pending')
                          <a class="btn btn-warning" href="{{route('admissionpayment.verifypayment', [$p->order_id])}}" class="btn btn-primary">             
                            Pending 
                          </a>
                        @else
                          <span class="badge bg-success">Paid</span>
                        @endif
                      </td>
                      <td>
                        @if($p->status == 'success')
                          <a href="{{route('admissionpayment.downloadreceipt', [$p->r_payment_id])}}" class="btn btn-primary">
                            <i class="fa-solid fa-download"></i>
                          </a>
                        @else
                          &nbsp;
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Download Form
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table table-sm table-bordered table-hovered">
        <tr><th>Name</th><th>Class</th><th>Download</th></tr>
        @foreach($paidapplicant as $a)
          <tr>
            <td>{{$a->applicant->fullname}}</td>
            <td>{{$a->applicant->class_name}}</td>
            <td>
              <a href="{{route('admission.downloadform', [$a->applicant_id])}}" class="btn btn-primary">
                <i class="fa-solid fa-download"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </table>
      </div>
    </div>
  </div>
  </div>
</div>
      
      
    </div>
  </div>
</div>
@endsection