@extends('layouts.admin')

@section('content')


<div class="container">
<h1 class="ps-1 py-3">Inserisci un piatto</h1>

    <form action="{{ route('admin.dishes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome piatto</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del piatto">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Inserire prezzo">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" aria-label="With textarea" id="description" name="description" placeholder="Inserisci la descrizione" rows="5"></textarea>
          </div>

        <div class="mb-3">
            <label for="is_visible" class="form-label">Visibile</label>
            <select id="is_visible" name="is_visible" class="form-select">

                <option value="1">Si</option>
                <option value="0">No</option>

            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
        <a href="{{route('admin.dishes.index')}}" class="btn btn-warning mt-3 ms-3">Indietro</a>
    </form>

</div>
@endsection
