
  @extends('layouts.app')
  @section('content')
  <h1>Class Information</h1>
  <a href="{{route('classinfo.insert')}}">Insert Class Info</a>
  <table class="table table-striped table-hover table-bordered table-sm table-responsive">
    <thead>
      <tr>
        <th>Class Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($classInfo as $info)
      <tr>
        <td>{{$info->name}}</td>
        <td>
          <a href="{{route('classinfo.edit', $info->id)}}">Edit</a>
          <a href="{{route('classinfo.delete', $info->id)}}">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection