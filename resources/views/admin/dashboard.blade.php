@extends('layouts.admin')

@section('content')

@if(auth()->user()->restaurant)
    <h1 class="text-center pt-5 pb-3">Benvenuto {{ Auth::user()->name }}</h1>
    <h3 class="text-center pb-3">Il tuo ristorante</h3>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Nome: {{ auth()->user()->restaurant->name }}</h5>
                        <p class="card-text">Indirizzo: {{ auth()->user()->restaurant->address }}</p>
                        <p class="card-text">Telefono: {{ auth()->user()->restaurant->phone }}</p>
                        <p class="card-text">P. IVA: {{ auth()->user()->restaurant->vat_number }}</p>
                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col py-4">
                <div class="text-center">
                    <h1>Registra il tuo ristorante</h1>
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success">Nuovo ristorante</a>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
