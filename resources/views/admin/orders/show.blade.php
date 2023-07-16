@extends('layouts.admin')

@section('content')
<div class="container">
  <h1 class="pt-3 pb-1 text-center m-0">Info Ordine</h1>
  <div class="text-end m-3">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mb-2">Torna al riepilogo</a>
    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID Piatto</th>
          <th scope="col">Nome</th>
          <th scope="col">Prezzo</th>
          <th scope="col">Quantità</th>
        </tr>
      </thead>
      @foreach ($order->dishes as $dishe)
      <tr class="text-center">
        <td class="align-middle">{{ $dishe->id }}</td>
        <td class="align-middle">{{ $dishe->name }}</td>
        <td class="align-middle">{{ $dishe->price }}€</td>

        @endforeach

        @foreach ($disheOrder as $pivot)
        <td class="align-middle">{{ $pivot->quantity }}</td>
        @endforeach

      </tr>
    </table>
  </div>
  @endsection