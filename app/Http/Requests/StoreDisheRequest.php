<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:30', 'min:5'],
            'price' => ['required', 'max:100.00', 'numeric'],
            'description' => ['required'],
            'visibility' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del piatto è obbligatorio',
            'name.max' => 'Il nome del piatto è troppo lungo',
            'name.min' => 'Il nome del piatto è troppo corto. Deve contenere almeno 5 caratteri',
            'price.required'=> 'il prezzo deve essere indicato',
            'price.max' => 'il prezzo è troppo alto',
            'price.numeric' => 'il prezzo deve corrispondere a un numero',
            'description.required' => 'la descrizione è obbligatoria',
            'visibility.required' => 'la visibilità è obbligatoria',

        ];
    }
}
