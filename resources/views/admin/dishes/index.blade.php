@extends('layouts.admin')

@section('content')
<div class="container mb-0 mt-3">
    @if (session('message'))
    <div class="alert alert-success m-0">
        {{ session('message') }}
    </div>
    @endif
</div>
{{-- @include('partials.session_message') --}}
<div class="container">
    <h1 class="pt-3 pb-1 text-center m-0">I tuoi prodotti</h1>
    <div class="text-end m-3">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Crea un Piatto</a>
    </div>
    <div class="row row-cols-3">
        @foreach ($dishes as $dishe)
        <div class="col pb-3">
            <div class="card">
                <figure class="m-0 p-3 pb-0">
                    <img class="w-100" src="{{ asset('storage/' . $dishe->image) }}" alt="{{ $dishe->name }}">
                </figure>
                <div class="card-body">
                    <h5 class="card-title mb-3"><span class="fw-bold">Nome del piatto: </span> {{ $dishe->name }}</h5>
                    <div class="card-text">
                        <a href="{{ route('admin.dishes.show', $dishe->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i> Dettagli
                        </a>
                        <a href="{{ route('admin.dishes.edit', $dishe->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Modifica
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.dishes.destroy', $dishe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete" data-restaurant-title='{{ $dishe->name }}'>
                                <i class="fa-solid fa-trash"></i> Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @include('partials.delete')
</div>
@endsection