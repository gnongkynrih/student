@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="card col-md-5">
      <div class="card-body">
        <div class="card-title">
          <h3>Admission Login</h3>
        </div>
        <form action="{{ route('admission.login')}}" method="post">
          @csrf
          <div class="row mb-3">
            <label for="email" class="col-form-label col-md-3">Email</label>
            <div class="col-md-9">
              <input type="email" name="email" value="{{old('email')}}" class="form-control">
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <label for="password" class="col-form-label col-md-3">Password</label>
            <div class="col-md-9">
              <input type="password" name="password" value="{{old('password')}}" class="form-control">
            </div>
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <a href="{{route('admission.registration')}}">Don't have an account? Register</a>
      </div>
    </div>
  </div>
</div>
@endsection