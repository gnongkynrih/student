@extends('layouts.app')
@section('content')
<div class="container">
        <h3>Family Information</h3>
      <form action="{{route('admission.parentsinfo')}}" method="post">
      @csrf
      @method('PUT')
      <div class="row mb-3">
        <div class="card col-md-6">
          <div class="card-body">
            <div class="form-floating mb-3">
              <input type="text" name="father_name" value="{{isset($parent) ? $parent->father_name : old('father_name')}}" class="form-control">
              <label for="father_name">Father's Name</label>
              @error('father_name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          <div class="form-floating mb-3">
            <input type="text" name="father_occupation" value="{{isset($parent) ? $parent->father_occupation : old('father_occupation')}}" class="form-control">
            <label for="father_occupation">Father's Occupation</label>
              
            @error('father_occupation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-floating mb-3">
              <input type="text" name="father_phone" value="{{isset($parent) ? $parent->father_phone : old('father_phone')}}" class="form-control">
              <label for="father_phone">Father's Phone</label>
              @error('father_phone')
              <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-floating mb-3">
              <input type="text" name="father_designation" value="{{isset($parent) ? $parent->father_designation : old('father_designation')}}" class="form-control">
            <label for="father_designation">Father Designation</label>
            @error('father_designation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        
          </div>
        </div>
        <div class="card col-md-6">
          <div class="card-body">
            <div class="form-floating mb-3">
              
                <input type="text" name="mother_name" value="{{isset($parent) ? $parent->mother_name : old('mother_name')}}" class="form-control">
              <label for="mother_name">Mother's Name</label>
              @error('mother_name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="mother_occupation" value="{{isset($parent) ? $parent->mother_occupation : old('mother_occupation')}}" class="form-control">
              <label for="mother_occupation">Mother's Occupation</label>
              @error('mother_occupation')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="mother_phone" value="{{isset($parent) ? $parent->mother_phone : old('mother_phone')}}" class="form-control">
              <label for="mother_phone">Mother's Phone</label>
              @error('mother_phone')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="mother_designation" value="{{isset($parent) ? $parent->mother_designation : old('mother_designation')}}" class="form-control">
                <label for="mother_designation">Mother Designation</label>

              @error('mother_designation')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>
       
        <div class="form-floating mb-3">
            <input type="text" name="guardian_name" value="{{isset($parent) ? $parent->guardian_name : old('guardian_name')}}" class="form-control">
          <label for="guardian_name">Guardian's Name</label>
          @error('guardian_name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="guardian_occupation" value="{{isset($parent) ? $parent->guardian_occupation : old('guardian_occupation')}}" class="form-control">
          <label for="guardian_occupation">Guardian's Occupation</label>
          @error('guardian_occupation')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="guardian_phone" value="{{isset($parent) ? $parent->guardian_phone : old('guardian_phone')}}" class="form-control">
          <label for="guardian_phone">Guardian's Phone</label>
          @error('guardian_phone')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="guardian_address" value="{{isset($parent) ? $parent->guardian_address : old('guardian_address')}}" class="form-control">
        <label for="guardian_address">Guardian Address</label>
          @error('guardian_address')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="corresponding_address" value="{{isset($parent) ? $parent->corresponding_address : old('corresponding_address')}}" class="form-control">
        <label for="corresponding_address">Corresponding Address</label>
          @error('corresponding_address')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="permanent_address" value="{{isset($parent) ? $parent->permanent_address : old('permanent_address')}}" class="form-control">
        <label for="permanent_address">Permanent Address</label>
          @error('permanent_address')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <label for="" class="col-form-label col-md-4">Number of children</label>
          <div class="col-md-8 row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
            <input type="text" name="boys" value="{{isset($parent) ? $parent->boys : old('boys')}}" class="form-control">
            <label for="boys">Boys</label>
          @error('boys')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
            </div>
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input type="text" name="girls" value="{{isset($parent) ? $parent->girls : old('girls')}}" class="form-control">
        <label for="girls">Girls</label>
          @error('girls')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

          </div>
        </div>
        </div>
        <div class="d-flex justify-content-between">
          <a href="{{route('admission.editpersonal',session('applicant_id'))}}" class="btn btn-info col-md-2">Back</a>
        <button type="submit" class="btn btn-primary col-md-2">Next</button>

        </div>
        
      </form>
</div>

@endsection