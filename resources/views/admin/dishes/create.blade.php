@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="ps-1 py-3">Inserisci un piatto</h1>
    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome piatto *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del piatto" required minlength="5" maxlength="30">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo *</label>
            <input type="number" class="form-control
                @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo del piatto" required min="1" max="100">
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" id="description" name="description" rows="5" placeholder="Inserisci la descrizione del piatto"></textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine *</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="is_visible" class="form-label @error('is_visible') is-invalid @enderror">Visibile</label>
            <select id="is_visible" name="is_visible" class="form-select">

                <option value="1">Si</option>
                <option value="0">No</option>

            </select>
            @error('is_visible')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salva</button>
        <button type="reset" class="btn btn-danger mt-3 ms-3">Cancella</button>

        <div class="alert alert-warning mt-5">
            <p class="text-decoration-underline fw-bold">Tutti i campi contrassegnati con * sono
                obbligatori</p>
            <p class="m-0 fw-bold">Nota:</p>
            <p>Di default il piatto sarà visibile</p>
        </div>
    </form>

</div>
@endsection