@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="ps-1 py-3">Ooops! Pagina non trovata</h1>
        <div class="row">
            <div class="col mb-3 d-flex justify-content-center gap-3">
                <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Torna al ristorante</a>
                <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
            </div>
        </div>
    </div>
@endsection
