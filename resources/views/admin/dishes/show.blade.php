@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="py-3 text-center m-0">Dettagli</h1>
        <div class="text-end mb-2">
            <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card d-flex align-items-center flex-row">
                    <figure class="w-50">
                        <img src="" alt="ciao">
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title"><span class="fw-bold">Piatto: </span>{{ $dishe->name }}</h5>
                        <p class="card-text my-1"><span class="fw-bold">Descrizione: </span>{{ $dishe->description }}</p>
                        <p class="card-text my-1"><span class="fw-bold">Prezzo: </span>{{ $dishe->price }}</p>
                        <p class="card-text my-1"><span class="fw-bold">Visibilità: </span>{{ $dishe->visibility === 0 ? 'No' : 'Si' }}</p>
                        <a href="" class="btn btn-primary">Modifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
