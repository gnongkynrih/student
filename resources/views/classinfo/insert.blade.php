 @extends('layouts.app')
@section('content')
   <div class="row">
    <form method="POST" action="{{isset($classInfo) ? route('classinfo.update',$classInfo->id): route('classinfo.create')}}">
    @csrf
    <div class="card col-6 mx-auto">

      <div class="card-body">
        <div class="card-title">
          Class Information
        </div>
      
        @if(isset($classInfo))
          @method('PUT')
        @endif
        <div class="form-floating mb-1">
          <input class="form-control" type="text" value="{{ isset($classInfo) ? $classInfo->name : ''}}" name="name" placeholder="Class Name">
          <label>Class Name</label>
          @error('name')
            <span class="text-danger text-sm" >
              {{ $message}}
            </span>
          @enderror
        </div>
      </div>
      <div class="card-footer text-center">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>

    </div>
  </form>
   </div>
@endsection