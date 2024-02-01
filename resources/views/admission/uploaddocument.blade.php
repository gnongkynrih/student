@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="card col-md-11">
      <div class="card-body">
        <h3 class="card-title">
          <a href="{{ route('admission.dashboard') }}" class="text-decoration-none">
          <i class="fa-solid fa-house-chimney"></i></a> /
           Upload document: {{ $applicant->fullname }}</h3>
        <hr/>
        <div class="mb-3">
          <label for="passport" class="form-label">Passport Photo</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm" id="passport" type="file">
            </div>
              <div class="col-md-6" id="lblpassport">
                {{ isset($applicant->passport) ? 'uploaded' : '' }}
              </div>
          </div>
          
        </div>
        <div class="mb-3">
          <label for="birth_certificate" class="form-label">Birth Certificate</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm" id="birth_certificate" type="file">
            </div>
            <div class="col-md-6" id="lblbirth_certificate">
              {{ isset($applicant->birth_certificate) ? 'uploaded' : '' }}
            </div>
          </div>
          
        </div>
        <div class="mb-3">
          <label for="baptism_certificate" class="form-label">Baptism Certificate</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm" id="baptism_certificate" type="file">
            </div>
              <div class="col-md-6" id="lblbaptism_certificate">
                {{ isset($applicant->baptism_certificate) ? 'uploaded' : '' }}
              </div>
          </div>
          
        </div>
        <div class="mb-3">
          <label for="caste_certificate" class="form-label">Caste Certificate</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm" id="caste_certificate" type="file">
            </div>
              <div class="col-md-6" id="lblcaste_certificate">
                {{ isset($applicant->caste_certificate) ? 'uploaded' : '' }}
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="family_pic" class="form-label required">Family Picture</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm " id="family_pic" type="file">
            </div>
              <div class="col-md-6" id="lblfamily_pic">
                {{ isset($applicant->family_pic) ? 'uploaded' : '' }}
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="father_id" class="form-label">Father ID</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm " id="father_id" type="file">
            </div>
              <div class="col-md-6" id="lblfather_id">
                {{ isset($applicant->father_id) ? 'uploaded' : '' }}
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="mother_id" class="form-label">Mother ID</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm " id="mother_id" type="file">
            </div>
              <div class="col-md-6" id="lblmother_id">
                {{ isset($applicant->mother_id) ? 'uploaded' : '' }}
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="address_proof" class="form-label">Address Proof</label>
          <div class="row">
            <div class="col-md-6">
              <input accept=".jpg, .jpeg, .png, .pdf" class="form-control form-control-sm " id="address_proof" type="file">
            </div>
            <div class="col-md-6" id="lbladdress_proof">
              {{ isset($applicant->address_proof) ? 'uploaded' : '' }}
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center m-3">
          <a href="{{route('admission.dashboard')}}" class="btn btn-secondary col-md-3"><i class="fa-solid fa-home"></i></a>
          <a href="{{route('admission.preview')}}" class="btn btn-primary col-md-3">Preview</a>
        </div>
      </div>

    </div>
  </div>
</div> 

<div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="headerModal"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="documentuploaded">
        this is a test
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>
<script type="text/javascript">
  //add event listener to the file input element
  const birth = document.getElementById('birth_certificate');
  const caste_certificate = document.getElementById('caste_certificate');
  const family = document.getElementById('family_pic');
  const baptism = document.getElementById('baptism_certificate');
  const father = document.getElementById('father_id');
  const mother = document.getElementById('mother_id');
  const address = document.getElementById('address_proof');
  
  document.getElementById('passport').addEventListener('change', function(e) {
    upload(e,'passport');
  });
  baptism.addEventListener('change', function(e) {
    upload(e,'baptism_certificate');
  });
  father.addEventListener('change', function(e) {
    upload(e,'father_id');
  });
  mother.addEventListener('change', function(e) {
    upload(e,'mother_id');
  });
  address.addEventListener('change', function(e) {
    upload(e,'address_proof');
  });

  birth.addEventListener('change', function(e) {
    upload(e,'birth_certificate');
  });
  caste_certificate.addEventListener('change', function(e) {
    upload(e,'caste_certificate');
  });
  family.addEventListener('change', function(e) {
    upload(e,'family_pic');
  });

  function upload(e,sourceInput){
    const label = document.getElementById('lbl'+sourceInput);
    label.innerHTML = 'uploading...';
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append('image', file);
    formData.append('source', sourceInput);
    axios.post('/admission/upload', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then((response) => {
      const data = response.data.message.path;
      if(response.data.message.message=='ok'){
        label.innerHTML = '<a class="docs text-success" href="#" id="' + data + '"><i class="fa-solid fa-circle-check"></i> uploaded</a>';
        document.getElementById(data).addEventListener('click', function(e) {
          showModal(e,data,sourceInput);
        })
      }else{
        label.innerHTML = 'could not upload document';
        label.classList.add('text-danger');
      }
    }).catch((error) => {
      label.innerHTML = error.response.data.message;
      label.classList.add('text-danger');
    });
  }
  const modalbody = document.getElementById('documentuploaded');
  const header = document.getElementById('headerModal');
  function showModal(e,image,header){
    e.preventDefault();
   // header.innerHTML = 'header';
    modalbody.innerHTML = '<img src="'+image+'" class="img-fluid"/>';

    const myModal = new bootstrap.Modal(document.getElementById('documentModal'));
    myModal.show();
  }
  
</script>
@endsection

