<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDisheRequest extends FormRequest
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
            'price' => ['required', 'numeric', 'between:0, 100'],
            'description' => ['required'],
            'visibility' => ['required', 'boolean'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del piatto è obbligatorio.',
            'name.max' => 'Il nome del piatto è troppo lungo. Deve contenere al massimo 30 caratteri',
            'name.min' => 'Il nome del piatto è troppo corto. Deve contenere almeno 5 caratteri.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un valore numerico.',
            'price.between' => 'Il prezzo deve essere compreso tra 0 € e 100€.',
            'description.required' => 'La descrizione è obbligatoria.',
            'visibility.required' => 'La visibilità è obbligatoria.',
            'visibility.boolean' => 'Il valore di visibilità deve essere vero o falso.',
        ];
    }
}
