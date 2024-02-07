@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center mb-3">
    <table class="table table-bordered table-responsive table-sm">
      <tr>
        <th>Admission to class</th>
        <td>{{ $applicant->class_name }}</td>
      </tr>
      <tr>
        <th>Full Name</th>
        <td>{{ $applicant->fullname }}</td>
      </tr>
      <tr>
        <th>Date of birth</th>
        <td>{{ $applicant->dob }}</td>
      </tr>
      
    </table>
    <a href="#" id="viewdocument" data-bs-toggle="modal" data-bs-target="#exampleModal">Click to view uploaded documents</a>
  </div>
  <div class="row justify-content-end">
    <a href="{{route('admissionpayment.create')}}">Pay Admission Fee</a>
  </div>
</div>
<div class="modal fade modal-fullscreen" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Documnt uploaded</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <div class="col-md-3">
          <h4>Documents</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="docu" id="passport">Passport Photo</a></li>
            <li><a href="#"  class="docu" id="birth_certificate"> Birth Certificate</a></li>
            <li><a href="#"  class="docu" id="caste_certificate">Caste Certificate</a></li>
            <li>Address Proof</li>
            <li>Father ID</li>
            <li>Mother ID</li>
            <li>Address Proof</li>  
          </ul>
        </div>
        <div class="col-md-9" id="showDocument">
          Click on the documents to view
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  const viewdocument = document.getElementById('showDocument');
  const passport = document.getElementById('passport');
  const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    
  passport.addEventListener('click', (e) => {
    e.preventDefault();

    viewdocument.innerHTML = `<img src="{{$applicant->passport}}" alt="Passport Photo" class="img-fluid">`;
    myModal.show();
  });
  document.getElementById('birth_certificate').addEventListener('click', (e) => {
    e.preventDefault();
    viewdocument.innerHTML = `<img src="{{$applicant->birth_certificate}}" alt="Passport Photo" class="img-fluid">`;
    myModal.show();
  });
  document.getElementById('caste_certificate').addEventListener('click', (e) => {
    
  });
  
  // showDocument(e, image){
  //   e.preventDefault();
  //   viewdocument.innerHTML = `<img src="{{$applicant->caste_certificate}}" alt="Passport Photo" class="img-fluid">`;
  //   const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
  //   myModal.show();
  // }
</script>
@endsection