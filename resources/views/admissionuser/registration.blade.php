@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <form action="{{route('admission.register')}}" method="post">
      @csrf
      <div class="card col-5 mx-auto my-auto">
        <div class="card-header">Registration Page</div>
        <div class="card-body">
          <div class="form-floating mb-3">
            <input name="mobile" type="number" 
            class="form-control" id="mobile" value="{{old('mobile')}}">
            <label>Mobile Number</label>
            @error('mobile')
              <span class="text-danger">{{ $message}}</span>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input name="email" type="email" 
            class="form-control" id="email" placeholder="name@example.com">
            <label>Email address</label>
            @error('email')
              <span>{{$message}}</span>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label >Password</label>
            @error('password')
              <span>{{$message}}</span>
            @enderror
          </div>
          <div class="row text-center">
            <button class="btn btn-primary">
              Register
            </button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection