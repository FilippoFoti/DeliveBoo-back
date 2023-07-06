@extends('layouts.admin')

@section('content')
<h1 class="text-center py-5">{{ Auth::user()->name }} crea il tuo ristorante</h1>

<div class="container mb-4">
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" id="my-form">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Attività *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required minlength="2" maxlength="50" placeholder="Insersci il nome del ristorante">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo *</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required minlength="5" maxlength="100" placeholder="Insersci l'indirizzo del ristorante">
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono *</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required maxlength="10" placeholder="0123456789">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="vat_number" class="form-label">P. IVA *</label>
                    <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" value="{{ old('vat_number') }}" required maxlength="13" placeholder="IT01234567890">
                    @error('vat_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <p>Seleziona il tipo</p>
                    @foreach ($types as $type)
                    <div class="form-check">
                        <input class="form-check-input @error('type_id') is-invalid @enderror" name="type_id[]" type="checkbox" value="{{ $type->id }}" id="type-{{ $type->id }}" @checked(in_array($type->id, old('type_id', [])))>
                        <label class="form-check-label" for="type-{{ $type->id }}">
                            {{ $type->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('type_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="type-error" class="invalid-feedback d-block"></div>



                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.getElementById('my-form');
                            const checkboxes = document.querySelectorAll('input[name="type_id[]"]');
                            const minRequired = 1;
                            const maxAllowed = 3;
                            let checkedCount = 0;

                            checkboxes.forEach(function(checkbox) {
                                if (checkbox.checked) {
                                    checkedCount++;
                                }

                                checkbox.addEventListener('change', function() {
                                    if (this.checked) {
                                        checkedCount++;
                                    } else {
                                        checkedCount--;
                                    }

                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.disabled = checkedCount >= maxAllowed && !checkbox.checked;
                                    });

                                    if (checkedCount < minRequired || checkedCount > maxAllowed) {
                                        document.getElementById('type-error').textContent = 'Seleziona almeno ' +
                                            minRequired + ' e al massimo ' + maxAllowed + ' tipi.';
                                    } else {
                                        document.getElementById('type-error').textContent = '';
                                    }
                                });
                            });

                            form.addEventListener('submit', function(event) {
                                if (checkedCount < minRequired || checkedCount > maxAllowed) {
                                    event.preventDefault();
                                    document.getElementById('type-error').textContent = 'Seleziona almeno ' + minRequired +
                                        ' e al massimo ' + maxAllowed + ' tipi.';
                                }
                            });
                        });

                        function addPrefixToPhoneNumber() {
                            const phoneNumberInput = document.getElementById('phone');
                            let phoneNumber = phoneNumberInput.value.trim();

                            if (phoneNumber.length > 0) {
                                if (phoneNumber.length > 3) {
                                    phoneNumber = '+39 ' + phoneNumber.substr(0, 3) + ' ' + phoneNumber.substr(3);
                                } else {
                                    phoneNumber = '+39 ' + phoneNumber;
                                }

                                phoneNumberInput.value = phoneNumber;
                            }
                        }


                        document.addEventListener('DOMContentLoaded', function() {
                            const phoneNumberInput = document.getElementById('phone');
                            phoneNumberInput.addEventListener('blur', addPrefixToPhoneNumber);
                        });
                    </script>

                </div>

                <button class="btn btn-primary" type="submit">Invia</button>
                <div class="alert alert-warning mt-5">
                    <p class="text-decoration-underline fw-bold">Tutti i campi contrassegnati con * sono
                        obbligatori</p>
                    <p class="m-0 fw-bold">Nota:</p>
                    <p>E' necessario selezionare almeno una tipologia e massimo tre</p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection