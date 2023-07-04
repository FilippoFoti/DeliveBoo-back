@extends('layouts.admin')

@section('content')

<h1 class="text-center py-5">{{ Auth::user()->name }} crea il tuo ristorante</h1>

<div class="container mb-4">
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Attività</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}">
                    @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="vat_number" class="form-label">PIVA</label>
                    <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" value="{{old('vat_number')}}">
                    @error('vat_number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type_id">
                        <option value="" {{ old('type_id') == '' ? 'selected' : '' }}>Seleziona tipo</option>
                        @foreach ($types as $type)
                        <option value="{{ $type->name }}" {{ old('type_id') == $type->name ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection