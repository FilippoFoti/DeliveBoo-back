@extends('layouts.admin')

@section('content')


<div class="container">
<h1 class="ps-1 py-3">Inserisci un piatto</h1>

    <form action="{{ route('admin.dishes.update', $dishe->id ) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome piatto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dishe->name) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" min="10" max="100" class="form-control" id="price" name="price" value="{{ old('price', $dishe->price) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" aria-label="With textarea" id="description" name="description"  rows="5">{{ old('description', $dishe->description) }}</textarea>
          </div>

        <div class="mb-3">
            <label for="is_visible" class="form-label">Visibile</label>
            <select id="is_visible" name="visibility" class="form-select">
                <option @selected(old('visibility',$dishe->visibility)== 1) value="1">Si</option>
                <option @selected(old('visibility',$dishe->visibility)== 0) value="0">No</option>
            </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
        <a href="{{route('admin.dishes.index')}}" class="btn btn-warning mt-3 ms-3">Indietro</a>
    </form>

</div>
@endsection
