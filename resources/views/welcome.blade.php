@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_deliveboo d-flex align-items-center">
            <img style="width: 10%" src="https://cdn.pixabay.com/photo/2013/07/13/10/07/rubber-156597_1280.png" alt="">
            <p class="fw-bold fs-1 m-0 ms-2" style="color: #F2C802">DeliveBoo</p>
        </div>
        <h1 class="display-5 fw-bold">
            Benvenuto in DeliveBoo
        </h1>

        <p class="col-md-8 fs-4">Sei un ristoratore? Qui potrai registrarti e usufruire dei nostri servizi. Con DeliveBoo potrai aumentare le vendite del tuo ristorante comodamente da casa, basta inserire il tuo menu e il gioco è fatto!</p>
        {{-- <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg" type="button">Documentation</a> --}}
    </div>
</div>
@endsection