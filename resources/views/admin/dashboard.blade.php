@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-5">Benvenuto {{ Auth::user()->name }}</h1>
@endsection
