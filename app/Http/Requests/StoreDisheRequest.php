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
            'price' => ['required', 'between:1, 100', 'numeric'],
            'description' => ['required'],
            'is_visible' => ['required'],
            'image' => ['nullable']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del piatto è obbligatorio',
            'name.max' => 'Il nome del piatto è troppo lungo',
            'name.min' => 'Il nome del piatto è troppo corto. Deve contenere almeno 5 caratteri',
            'price.required' => 'Il prezzo deve essere indicato',
            'price.max' => 'Il prezzo è troppo alto',
            'price.numeric' => 'Il prezzo deve corrispondere a un numero',
            'description.required' => 'La descrizione è obbligatoria',
            'is_visible.required' => 'La visibilità è obbligatoria',

        ];
    }
}
