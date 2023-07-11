@extends('layouts.admin')

@section('content')
<div class="container mb-0 mt-3">
    @if (session('message'))
    <div class="alert alert-success m-0">
        {{ session('message') }}
<<<<<<< HEAD
    </div>
    @endif
</div>
{{-- @include('partials.session_message') --}}
<div class="container">
    <h1 class="pt-3 pb-1 text-center m-0">I tuoi prodotti</h1>
    <div class="text-end m-3">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Crea un Piatto</a>
    </div>

    @if ($dishes->isEmpty())
    <div class="alert alert-info text-center">Nessun piatto trovato, aggiungine uno!</div>
    @else
    <div class="row row-cols-3">
=======
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

>>>>>>> fixes
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Anteprima</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo €</th>
                    <th scope="col">Visibilità</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                @foreach ($dishes->sortBy(function ($dish) {
                return strtolower($dish->name);
                }) as $key => $dishe)
                <tr class="text-center">
                    <td style="width: 10%" class="align-middle">
=======
                @foreach ($dishes as $key => $dishe)
                <tr class="text-center @if ($dishe->visibility === 1) bg-secondary-subtle @endif" style="--bs-table-bg: none !important;--bs-bg-opacity: .5;">
                    <td style=" width: 10%" class="align-middle">
>>>>>>> fixes
                        <img style="width: 100%" src="{{ asset('storage/' . $dishe->image) }}" alt="{{ $dishe->name }}">
                    </td>
                    <td class="align-middle">{{ $dishe->name }}</td>
                    <td class="align-middle">{{ $shortDescription[$key] }}</td>
                    <td class="align-middle">{{ $dishe->price }}</td>
                    <td class="align-middle">
                        @if ($dishe->visibility === 1)
<<<<<<< HEAD
                        <Span class="fw-bold text-success">Si</Span>
                        @else($dishe->visibility === 2)
                        <span class="fw-bold text-danger">No</span>
=======
                        <span class="fw-bold">Si</span>
                        @else
                        <span class="fw-bold">No</span>
>>>>>>> fixes
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('admin.dishes.show', $dishe->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dishes.edit', $dishe->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.dishes.destroy', $dishe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete" data-restaurant-title='{{ $dishe->name }}'>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
    @endif

=======
>>>>>>> fixes
    @include('partials.delete')
</div>
@endsection