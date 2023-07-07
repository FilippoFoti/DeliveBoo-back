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