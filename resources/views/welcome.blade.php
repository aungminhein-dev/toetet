@extends('loginregisterlayout.master')
@section('title','Home Page')

@section('content')

<a href="{{route('loginPage')}}" class="btn btn-danger">Log In</a>
<a href="{{route('registerPage')}}" class="btn btn-primary">Log In</a>


@endsection
