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
    </div>
  </div>
</div>
@endsection