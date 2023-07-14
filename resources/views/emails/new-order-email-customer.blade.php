<h1> Hey {{$order->customer_name }} </h1>

<p>Grazie per aver effettuato l'ordine!</p>

<img style="width: 3%" src="https://cdn.pixabay.com/photo/2013/07/13/10/07/rubber-156597_1280.png" alt="">

<p>Ecco il tuo detaglio:</p>

<ul>
    @foreach($order->dishes as $dishe)
        <li>{{ $dishe->name }} <br> <span>Quantità:</span> x
    @endforeach
</ul>

@foreach ($disheOrder as $pivot)
<td class="align-middle">{{ $pivot->quantity }}</td>
@endforeach


<li style="margin-bottom: 10px;">
    <strong>Totale Eur:</strong> {{ $order->total_price }}
</li>
