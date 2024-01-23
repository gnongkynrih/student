@extends('layouts.app')
@section('content')
  <h3>Religion</h3>
<h5><a href="{{ route('religion.create') }}">Add Religion</a></h5>
  <table>
    <tr>
      <th>Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($religions as $religion)
      <tr>
        <td>{{ $religion->name }}</td>
        <td><a href="{{ route('religion.edit',$religion->id)}}">Edit</a></td>
        <td>
          <form method="POSt" action="{{ route('religion.delete',$religion->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
          </form>
        </td>

        {{-- <td>
          <a href="{{ route('religion.edit', $religion->id) }}">Edit</a>
          <form action="{{ route('religion.destroy', $religion->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
          </form>
        </td> --}}
      </tr>
    @endforeach
@endsection