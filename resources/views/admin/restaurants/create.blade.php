@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-5">{{ Auth::user()->name }} crea il tuo ristorante</h1>

    <div class="container mb-4">
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data"
                    id="my-form">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Attività *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required minlength="2" maxlength="50"
                            placeholder="Insersci il nome del ristorante">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo *</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address') }}" required minlength="5" maxlength="100"
                            placeholder="Insersci l'indirizzo del ristorante">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefono *</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="+39{{ old('phone') }}" required maxlength="13"
                            placeholder="Inserisci il numero di telefono">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="phone-error" class="invalid-feedback d-block"></div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vat_number" class="form-label">P. IVA *</label>
                        <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number"
                            name="vat_number" value="IT{{ old('vat_number') }}" required maxlength="13"
                            placeholder="IT01234567890">
                        @error('vat_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="vat_number-error" class="invalid-feedback d-block"></div>
                    </div>
                    <div class="mb-3">
                        <p>Seleziona il tipo</p>
                        @foreach ($types as $type)
                            <div class="form-check">
                                <input class="form-check-input @error('type_id') is-invalid @enderror" name="type_id[]"
                                    type="checkbox" value="{{ $type->id }}" id="type-{{ $type->id }}"
                                    @checked(in_array($type->id, old('type_id', [])))>
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
                            //Controllo client-side sulle checkbox, verifica che ce ne sia almeno una selezionata
                            document.addEventListener('DOMContentLoaded', function() {
                                const form = document.getElementById('my-form');
                                const checkboxes = document.querySelectorAll('input[name="type_id[]"]');
                                const minRequired = 1;
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

                                        if (checkedCount < minRequired) {
                                            document.getElementById('type-error').textContent = 'Seleziona almeno ' +
                                                minRequired + ' tipologia';
                                        } else {
                                            document.getElementById('type-error').textContent = '';
                                        }
                                    });
                                });

                                form.addEventListener('submit', function(event) {
                                    if (checkedCount < minRequired) {
                                        event.preventDefault();
                                        document.getElementById('type-error').textContent = 'Seleziona almeno ' + minRequired +
                                            ' tipologia';
                                    }
                                });
                            });

                            //Controllo client-side sul numero di telefono
                            function countOccurrences(string, searchValue) {
                                return string.split(searchValue).length - 1;
                            }

                            document.addEventListener('DOMContentLoaded', function() {
                                const phoneInput = document.getElementById('phone');

                                phoneInput.addEventListener('input', function() {
                                    let phoneNumber = this.value.replace(/[^+\d]/g,
                                        ''); // Rimuovi tutti i caratteri non numerici

                                    if (phoneNumber.length > 13) {
                                        phoneNumber = phoneNumber.slice(0, 13); // Limita il numero di caratteri a 13
                                    }

                                    if (!phoneNumber.startsWith('+39')) {
                                        phoneNumber = '+39' +
                                            phoneNumber; // Se l'utente cerca di selezionare il +39 ed eliminarlo viene re-inserito
                                    }

                                    // Impedisco che l'utente inserisca più di un simbolo + e lo avviso
                                    if (phoneNumber.length === 13 && countOccurrences(phoneNumber, '+') > 1) {
                                        document.getElementById('phone-error').textContent =
                                            'Il numero non può contenere più di un simbolo +';
                                    } else if (phoneNumber.length < 13) {
                                        document.getElementById('phone-error').textContent =
                                            'Inserire 10 numeri';
                                    } else {
                                        document.getElementById('phone-error').textContent =
                                            '';
                                    }

                                    this.value = phoneNumber;
                                    console.log(phoneNumber);
                                });

                                phoneInput.addEventListener('keydown', function(event) {
                                    if (event.key === 'Backspace' && this.selectionStart === 3 && this.value.length === 3) {
                                        event
                                            .preventDefault(); // Impedisci la rimozione del prefisso "+39" se il cursore si trova subito dopo il prefisso
                                    }
                                });
                            });

                            //Controllo sulla P.IVA
                            document.addEventListener('DOMContentLoaded', function() {
                                const vat_numberInput = document.getElementById('vat_number');

                                vat_numberInput.addEventListener('input', function() {
                                    let vat_numberInput = this.value.replace(/\D/g,
                                        ''); // Rimuovi tutti i caratteri non numerici

                                    if (vat_numberInput.length > 13) {
                                        vat_numberInput = vat_numberInput.slice(0, 13); // Limita il numero di caratteri a 13
                                    }

                                    if (!vat_numberInput.startsWith('IT')) {
                                        vat_numberInput = 'IT' +
                                            vat_numberInput; // Se l'utente cerca di selezionare il IT ed eliminarlo viene re-inserito
                                    }
                                    // Impedisco che l'utente inserisca più di un simbolo + e lo avviso
                                    if (vat_numberInput.length < 13) {
                                        document.getElementById('vat_number-error').textContent =
                                            'Inserire 11 numeri';
                                    } else {
                                        document.getElementById('vat_number-error').textContent =
                                            '';
                                    }

                                    this.value = vat_numberInput;
                                    console.log(vat_numberInput);
                                });

                                vat_numberInput.addEventListener('keydown', function(event) {
                                    if (event.key === 'Backspace' && this.selectionStart === 2 && this.value.length === 2) {
                                        event
                                            .preventDefault(); // Impedisci la rimozione del prefisso "IT" se il cursore si trova subito dopo il prefisso
                                    }
                                });
                            });
                        </script>

                    </div>

                    <button class="btn btn-primary" type="submit">Invia</button>
                    <div class="alert alert-warning mt-5">
                        <p class="text-decoration-underline fw-bold">Tutti i campi contrassegnati con * sono
                            obbligatori</p>
                        <p class="m-0 fw-bold">Nota:</p>
                        <p>E' necessario selezionare almeno una tipologia</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
