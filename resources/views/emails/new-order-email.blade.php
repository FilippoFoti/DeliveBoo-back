<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .footer {
            margin-top: 30px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ordine Ricevuto</h1>
        <p>Ciao Admin,</p>
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

        <strong>Totale Eur:</strong> {{ $order->total_price }} €


        <div class="footer">
            <p>Grazie,</p>
            <p>Il Team DeliveBoo</p>
            <img style="width: 10%" src="https://cdn.pixabay.com/photo/2013/07/13/10/07/rubber-156597_1280.png" alt="">
        </div>
    </div>
</body>

</html>





{{--
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
</ul> --}}