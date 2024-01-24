@extends('layouts.app')
@section('content')
  @if(\Session::get('success') == 'true')
    YOur email verification completed. please login to coninue
    <a href="{{route('admission.login')}}">Login</a>
  @else
    Don't t
  @endif
@endsection