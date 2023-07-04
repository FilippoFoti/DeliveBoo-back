@extends('layouts.admin')

@section('content')
    @if (auth()->user()->restaurant)
        <h1 class="text-center my-3">Benvenuto {{ Auth::user()->name }}</h1>
        <div class="container">
            <div class="row border rounded p-4">
                <div class="col">
                    <figure>
                        <img src="" alt="Ristorante">
                    </figure>
                </div>
                <div class="col">
                    <div class="div">
                        <h5 class="mb-3"><span class="fw-bold">Nome Ristoratore: </span>{{ Auth::user()->name }}</h5>
                        <h5 class="mb-3"><span class="fw-bold">Email: </span>{{ Auth::user()->email }}</h5>
                        <h5 class="mb-3"><span class="fw-bold">P.IVA: </span>{{ auth()->user()->restaurant->vat_number }}
                        </h5>
                        <h5 class="mb-3"><span class="fw-bold">Telefono: </span>{{ auth()->user()->restaurant->phone }}<h5>
                    </div>
                </div>
                <div class="col">
                    <h5 class="mb-3"><span class="fw-bold">Nome Ristorante: </span>{{ auth()->user()->restaurant->name }}
                    </h5>
                    <h5 class="mb-3"><span class="fw-bold">Indirizzo: </span>{{ auth()->user()->restaurant->address }}
                    </h5>
                    <h5 class="mb-3"><span class="fw-bold">Tipo cucina: </span>
                        @foreach (auth()->user()->restaurant->types as $key => $type)
                            {{ $type->name }}
                            @if ($key !== count(auth()->user()->restaurant->types) - 1)
                                ,
                            @endif
                        @endforeach
                    </h5>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Menù</a>
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
