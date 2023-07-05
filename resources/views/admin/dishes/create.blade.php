@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="ps-1 py-3">Crea un nuovo piatto</h1>
        <div class="text-end mb-2">
            <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
        </div>
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row row-cols-2 flex-wrap">

                @csrf
                <div class="col mb-3">
                    <label for="name" class="form-label">Nome piatto *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Inserisci il nome del piatto" required minlength="5" maxlength="30">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="price" class="form-label">Prezzo *</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" placeholder="Inserisci il prezzo del piatto" required min="1" max="100">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="description" class="form-label">Descrizione *</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" id="description"
                        name="description" rows="5" placeholder="Inserisci la descrizione del piatto" required></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" placeholder="">
                    </div>

                    <label for="is_visible" class="form-label @error('is_visible') is-invalid @enderror">Visibile *</label>
                    <select id="is_visible" name="is_visible" class="form-select" required>

                        <option value="">Seleziona la visibilità</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>

                    </select>
                    @error('is_visible')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 my-4 d-flex justify-content-center gap-4">
                    <button type="submit" class="btn btn-primary">Salva</button>
                    <button type="reset" class="btn btn-danger">Cancella</button>
                </div>

                <div class="col-12 alert alert-warning text-center">
                    <p class="text-decoration-underline fw-bold my-2">Tutti i campi contrassegnati con * sono obbligatori</p>
                </div>
            </div>
        </form>
    @endsection
