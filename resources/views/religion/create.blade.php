 @extends('layouts.app')
@section('content')
  <div class="card col-4 mx-auto">
    <div class="card-body">
      <form action="{{ isset($religion) ? route('religion.update',$religion->id) : route('religion.store')}}" method="POST">
    @csrf
    @if(isset($religion))
      @method('PUT')
    @endif
    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input class="form-control" type="text" name="name" id="name" value="{{ isset($religion) ? $religion->name:''}}">
      @error('name')
        <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>
    <div class="flex justify-content-between">
      <a class="btn btn-secondary" href="{{route('religion.index')}}">Back</a>
    <input class="btn btn-primary" type="submit" value="Save">
    </div>
  </form>
    </div>
  </div>
@endsection