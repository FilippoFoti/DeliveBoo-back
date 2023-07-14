@extends('layouts.admin')

@section('content')
<div class="container">
  <h1 class="pt-3 pb-1 text-center m-0">Riepilogo Ordini</h1>
  <div class="text-end m-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-2">Torna alla dashboard</a>
    <div class="row row-cols-3">
      <table class="table table-striped">
        <thead>
          <tr class="text-center">
            <th scope="col">ID Ordine</th>
            <th scope="col">Data</th>
            <th scope="col">Nome Cliente</th>
            <th scope="col">Cognome Cliente</th>
            <th scope="col">Totale</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($ordersDesc as $order)
          <tr class="text-center">
            <td class="align-middle">{{ $order->id }}</td>
            <td class="align-middle">{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
            <td class="align-middle">{{ $order->customer_name }}</td>
            <td class="align-middle">{{ $order->customer_lastname }}</td>
            <td class="align-middle">{{ $order->total_price }} €</td>
            <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-success">
                <i class="fa-solid fa-eye"></i>
              </a></td>

          </tr>
          @endforeach

        </tbody>
    </div>
  </div>
  @endsection