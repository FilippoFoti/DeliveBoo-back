@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="py-3 text-center m-0">Dettagli</h1>
        <div class="text-end mb-2">
            <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
        </div>
        <div class="row row-cols-2 d-flex justify-content-center">
            <div class="card d-flex align-items-center flex-row">
                <div class="col-6">
                    <figure class="my-2">
                        <img class="w-100" src="{{ asset('storage/' . $dishe->image) }}" alt="{{ $dishe->name }}">
                    </figure>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="card-body">
                        <h5 class="card-title"><span class="fw-bold">Piatto: </span>{{ $dishe->name }}</h5>
                        <p class="card-text mb-2"><span class="fw-bold">Descrizione: </span>{{ $dishe->description }}</p>
                        <p class="card-text mb-2"><span class="fw-bold">Prezzo: € </span>{{ $dishe->price }}</p>
                        <p class="card-text mb-2"><span class="fw-bold">Visibilità:
                            </span>{{ $dishe->visibility === 0 ? 'No' : 'Si' }}</p>
                        <a href="{{ route('admin.dishes.edit', $dishe->id) }}" class="btn btn-primary">Modifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
