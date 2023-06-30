@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-5">Benvenuto {{ Auth::user()->name }}</h1>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success">Nuovo ristorante</a>
                </div>
            </div>
        </div>
    </div>

@endsection
