@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row card">
    <div class="card-body">
      <div class="card-header">
        <h3>Personal Information</h3>
      </div>
      <div class="card-body">
        <form action="{{route('admission.personal')}}" method="post">
          @csrf
        
          <div class="row mb-3">
            <label for="class_name" class="col-form-label col-md-3">Admission to class</label>
            <div class="col-md-3">
              <select name="class_name" id="" class="form-select">
                @foreach($admissiontoclass as $class)
                  <option value="{{$class->name}}" >{{$class->name}}</option>
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
              <input type="text" name="middle_name" value="{{old('middle_name')}}" class="form-control">
            </div>
            @error('middle_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="last_name">Last Name</label>
            <div class="col-md-8">
              <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control">
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
                  <option value="{{$category}}" >{{$category}}</option>
                @endforeach
              </select>
            </div>
            <label for="religion_id" class="col-form-label col-md-2">Religion</label>
            <div class="col-md-4">
              <select name="religion_id" class="form-select">
                @foreach($religions as $religion)
                  <option value="{{$religion->id}}" >{{$religion->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3">Gender</label>
            <div class="col-md-2">
              <select class="form-select" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <label class="col-form-label col-md-2" for="dob">Date of Birth</label>
            <div class="col-md-2">
              <input type="date" name="dob" value="{{old('dob')}}" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="nationality" class="col-form-label col-md-3">Nationality</label>
            <div class="col-md-3">
              <select name="nationality" id="nationality" class="form-select">
                <option value="Indian">Indian</option>
                <option value="PIO">PIO</option>
                <option value="OCI">OCI</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <label for="state" class="col-form-label col-md-2">State</label>
            <div class="col-md-3">
              <select name="state" id="state" class="form-select">
                @foreach($states as $key => $value)
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="language">Language spoken</label>
            <div class="col-md-8">
              <input type="text" name="language" value="{{old('language')}}" class="form-control">
            </div>
            @error('language')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3" for="community">Community</label>
            <div class="col-md-8">
              <input type="text" name="community" value="{{old('community')}}" class="form-control">
            </div>
            @error('community')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-form-label col-md-3">Whether Catholic</label>
            <div class="col-md-2">
              <select class="form-select" name="is_catholic">
                <option value="Yes">Male</option>
                <option value="No">No</option>
              </select>
            </div>
            <label class="col-form-label col-md-1" for="balang">Parish</label>
            <div class="col-md-5">
              <input type="text" name="balang" value="{{old('balang')}}" class="form-control">
            </div>
          </div>
          <div class="row text-center">
            <button class="btn btn-primary" type="submit">Next</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection