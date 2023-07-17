@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="pt-3 pb-1 text-center m-0">Riepilogo Ordini</h1>
    <div class="text-end m-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-2">Torna alla dashboard</a>
        <div class="row row-cols-3">
            <div class="mx-auto text-center">
                <canvas id="myChart"></canvas>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID Ordine</th>
                        <th scope="col">Data</th>
                        <th scope="col">Nome Cliente</th>
                        <th scope="col">Cognome Cliente</th>
                        <th scope="col">Totale Ordine</th> <!-- Aggiungi questa colonna -->
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
            </table>
            @if ($ordersDesc->isEmpty())
            <div class="bg-warning p-2 d-block text-center w-100">
                <span>Nessun ordine trovato</span>
            </div>
            @endif
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <body>
        <canvas id="myChart"></canvas>

        <script>
            <?php
            $monthlyOrders = [];
            foreach ($ordersDesc as $order) {
                $monthYear = date('F Y', strtotime($order->date)); // Ottieni il mese e l'anno dell'ordine
                if (!isset($monthlyOrders[$monthYear])) {
                    $monthlyOrders[$monthYear] = 0;
                }
                $monthlyOrders[$monthYear]++;
            }

            $labels = array_keys($monthlyOrders);
            $data = array_values($monthlyOrders);
            ?>

            <?php if (!empty($data)) : ?>
                // Dati di esempio per la tabella
                var data = {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: "Ordini",
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: "#FFEB3B",
                        borderColor: "#FFEB3B",
                        borderWidth: 1
                    }]
                };

                // Opzioni per il grafico
                var options = {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0,
                            stepSize: 1,
                            ticks: {
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value.toString();
                                    }
                                }
                            }
                        }
                    }
                };

                // Creazione del grafico a barre
                var ctx = document.getElementById("myChart").getContext("2d");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: options
                });
            <?php endif; ?>
        </script>

    </body>

    </html>
    @endsection