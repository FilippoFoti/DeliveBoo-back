@extends('layouts.admin')

@section('content')
    {{-- @include('partials.session_message') --}}
    <div class="container">
        <h1 class="pt-3 pb-1 text-center m-0">I tuoi prodotti</h1>
        <div class="text-end m-3">
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Crea un Piatto</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Nome piatto</th>
                    <th scope="col" class="text-center">Prezzo</th>
                    <th scope="col" class="text-center">Descrizione</th>
                    <th scope="col" class="text-center">Visibilità</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dishe)
                    <tr class="align-middle">
                        <th scope="row" class="text-center">{{ $dishe->id }}</th>
                        <td class="text-center">{{ $dishe->name }}</td>
                        <td class="text-center">{{ $dishe->price }}</td>
                        <td class="text-center w-50">{{ $dishe->description }}</td>
                        <td class="text-center">{{ $dishe->visibility === 0 ? 'No' : 'Si' }}</td>

                        <td class="text-nowrap text-center">
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
    </div>
@endsection
