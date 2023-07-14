<h1>
    Ciao Admin,
</h1>
<p>Hai appena ricevuto un ordine. Ecco i dettagli:</p> <br>

<ul>
    <li style="margin-bottom: 10px;">
        <strong>Nome:</strong> {{ $order->customer_name }}
    </li>
    <li style="margin-bottom: 10px;">
        <strong>Cognome:</strong> {{ $order->customer_lastname }}
    </li>
    <li style="margin-bottom: 10px;">
        <strong>Email:</strong> {{ $order->email }}
    </li>
    <li style="margin-bottom: 10px;">
        <strong>Indirizzo:</strong> {{ $order->address }}
    </li>
    <li style="margin-bottom: 10px;">
        <strong>Telefono:</strong> {{ $order->phone }}
    </li>
    <li style="margin-bottom: 10px;">
        <strong>Totale Eur:</strong> {{ $order->total_price }}
    </li>
</ul>
