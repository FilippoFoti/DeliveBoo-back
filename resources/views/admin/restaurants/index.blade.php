@extends('layouts.app')

@section('content')
    <h1 class="text-center">ristorante</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ristorante</th>
                            <th scope="col">id</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">PIVA</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <th scope="row">{{ $restaurant->name }}</th>
                                <td>{{ $restaurant->id }}</td>
                                <td>{{ $restaurant->address }}</td>
                                <td>{{ $restaurant->phone }}</td>
                                <td>{{ $restaurant->vat_number }}</td>
                                <td>
                                    <a class="btn btn-success" href="">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
