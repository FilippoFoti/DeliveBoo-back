@extends('layouts.admin')

@section('content')
<div class="container">
  <h2>Info Ordine</h2>
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