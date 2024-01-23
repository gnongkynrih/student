 @extends('layouts.app')
@section('content')
  <form action="{{ isset($religion) ? route('religion.update',$religion->id) : route('religion.store')}}" method="POST">
    @csrf
    @if(isset($religion))
      @method('PUT')
    @endif
    <div>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="{{ isset($religion) ? $religion->name:''}}">
    </div>
    <a href="{{route('religion.index')}}">Back</a>
    <input type="submit" value="Save">
  </form>
@endsection