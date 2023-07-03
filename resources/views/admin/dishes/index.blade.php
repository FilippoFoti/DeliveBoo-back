@extends('layouts.admin')

@section('content')
    {{-- @include('partials.session_message') --}}
    <h1 class="ps-1 py-3">I tuoi prodotti</h1>
    <div class="text-end">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Crea Piatto</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome piatto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Visibilità</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dishe)
                <tr class="align-middle">
                    <th scope="row">{{ $dishe->id }}</th>
                    <td>{{ $dishe->name }}</td>
                    <td>{{ $dishe->price }}</td>
                    <td>{{ $dishe->description }}</td>
                    <td>{{ $dishe->visibility === 0 ? 'No' : 'Si' }}</td>

                    <td class="text-nowrap">
                        <a href="{{ route('admin.dishes.show', $dishe->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dishes.edit', $dishe->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.dishes.destroy', $dishe->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
