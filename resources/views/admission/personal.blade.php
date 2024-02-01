@extends('layouts.app')
@section('content')
<div class="container">
  {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
  <div class="row card">
    <div class="card-body">
      <div class="card-header">
        <h3>Personal Information</h3>
      </div>
      <div class="card-body">
        <form action="{{isset($applicant) ? route('admission.updatepersonal',$applicant->id) : route('admission.personal')}}" method="post">
          @csrf
          @if(isset($applicant))
            @method('PUT')
          @endif
          <div class="row mb-3">
            <label for="class_name" class="col-form-label col-md-3">Admission to class</label>
            <div class="col-md-3">
              <select name="class_name" id="" class="form-select">
                @foreach($admissiontoclass as $class)
                  <option value="{{$class->name}} {{isset($applicant) && $applicant->class_name == $class->class_name ? "selected":""}}" >{{$class->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="first_name">First Name</label>
            <div class="col-md-8">
              <input placeholder="First Name" type="text" name="first_name" value="{{ isset($applicant) ? $applicant->first_name :old('first_name')}}" class="form-control">
            </div>
            @error('first_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="middle_name">Middle Name</label>
            <div class="col-md-8">
              <input type="text" name="middle_name" value="{{isset($applicant) ? $applicant->middle_name : old('middle_name') }}" class="form-control">
            </div>
            @error('middle_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="last_name">Last Name</label>
            <div class="col-md-8">
              <input type="text" name="last_name" value="{{ isset($applicant) ? $applicant->last_name :old('last_name')}}" class="form-control">
            </div>
            @error('last_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="category">Category</label>
            <div class="col-md-2">
              <select name="category" class="form-select">
                @foreach($categories as $category)
                  <option value="{{$category}}" {{isset($applicant) && $applicant->category == $category ? "selected":""}} >{{$category}}</option>
                @endforeach
              </select>
            </div>
            <label for="religion_id" class="col-form-label col-md-2">Religion</label>
            <div class="col-md-4">
              <select name="religion_id" class="form-select">
                @foreach($religions as $religion)
                  <option value="{{$religion->id}}" {{isset($applicant) && $applicant->religion_id == $religion->id ? "selected":""}} >{{$religion->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3">Gender</label>
            <div class="col-md-2">
              <select class="form-select" name="gender">
                <option value="Male" {{isset($applicant) && $applicant->gender == "Male" ? "selected":""}}>Male</option>
                <option value="Female" {{isset($applicant) && $applicant->gender == "Female" ? "selected":""}}>Female</option>
              </select>
            </div>
            <label class="col-form-label col-md-2" for="dob">Date of Birth</label>
            <div class="col-md-2">
              <input type="date" name="dob" value="{{isset($applicant)? $applicant->date_of_birth: old('dob')}}" class="form-control">
              @error('dob')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="nationality" class="col-form-label col-md-3">Nationality</label>
            <div class="col-md-3">
              <select name="nationality" id="nationality" class="form-select">
                <option value="Indian" {{isset($applicant) && $applicant->nationality=="India"? "Selected":""}}>Indian</option>
                <option value="PIO" {{isset($applicant) && $applicant->nationality=="PIO"? "Selected":""}}>PIO</option>
                <option value="OCI" {{isset($applicant) && $applicant->nationality=="OCI"? "Selected":""}}>OCI</option>
                <option value="Other" {{isset($applicant) && $applicant->nationality=="Other"? "Selected":""}}>Other</option>
              </select>
            </div>
            <label for="state" class="col-form-label col-md-2">State</label>
            <div class="col-md-3">
              <select name="state" id="state" class="form-select">
                @foreach($states as $key => $value)
                  <option value="{{$key}}" {{isset($applicant) && $applicant->state== $key? "Selected":""}}>{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="language">Language spoken</label>
            <div class="col-md-8">
              <input type="text" name="language" value="{{ isset($applicant) ? $applicant->language :old('language')}}" class="form-control">
            </div>
            @error('language')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="community">Community</label>
            <div class="col-md-8">
              <input type="text" name="community" value="{{ isset($applicant) ? $applicant->community :old('community')}}" class="form-control">
            </div>
            @error('community')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3">Whether Catholic</label>
            <div class="col-md-2">
              <select class="form-select" name="is_catholic">
                <option value="Yes" {{isset($applicant) && $applicant->is_catholic=="Yes"? "Selected":""}}>Yes</option>
                <option value="No" {{isset($applicant) && $applicant->is_catholic=="No"? "Selected":""}}>No</option>
              </select>
            </div>
            <label class="col-form-label col-md-1" for="balang">Parish</label>
            <div class="col-md-5">
              <input type="text" name="balang" value="{{ isset($applicant) ? $applicant->balang :old('balang')}}" class="form-control">
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <a href="{{route('admission.dashboard')}}" class="btn btn-secondary col-md-4">Home</a>
            <button class="btn btn-primary col-md-4" type="submit">Next</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection