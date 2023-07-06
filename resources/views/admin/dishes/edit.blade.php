@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="ps-1 py-3">Modifica il piatto</h1>
    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>
    <form action="{{ route('admin.dishes.update', $dishe->id) }}" method="POST" enctype="multipart/form-data">
        <div class="row row-cols-2 flex-wrap">
            @method('PUT')
            @csrf
            <div class="col mb-3">
                <label for="name" class="form-label">Nome piatto *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id=" name" name="name" value="{{ old('name', $dishe->name) }}" required minlength="5" maxlength="30">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="price" class="form-label">Prezzo * €</label>
                <input type="number" required min="0" max="100" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $dishe->price) }}">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="description" class="form-label">Descrizione *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" id="description" name="description" rows="5" required>{{ old('description', $dishe->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col mb-3">
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                    @if (asset('storage/' . $dishe->image))
                    <div class="mt-2">
                        <img class="w-25" id="image-preview" src="{{ asset('storage/' . $dishe->image) }}" alt="Vecchia immagine">
                    </div>
                    @else
                    <div class="mt-2">
                        <img class="d-none w-25" id="image-preview" src="" alt="">
                    </div>
                    @endif
                </div>
            </div>



            <div class="col mb-3">
                <label for="is_visible" class="form-label @error('is_visible') is-invalid @enderror">Visibile</label>
                <select id="is_visible" name="visibility" class="form-select">

                    <option @selected(old('visibility', $dishe->visibility) == 1) value="1">Si</option>
                    <option @selected(old('visibility', $dishe->visibility) == 0) value="0">No</option>

                </select>
                @error('is_visible')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="col mb-3 d-flex justify-content-center align-items-end gap-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <button type="reset" class="btn btn-danger">Cancella</button>
            </div>

            <div class="col-12 alert alert-warning text-center">
                <p class="text-decoration-underline fw-bold my-2">Tutti i campi contrassegnati con * sono obbligatori
                </p>
            </div>
        </div>
    </form>
</div>
@endsection