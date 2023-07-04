<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRestaurantRequest extends FormRequest
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
            'name' => ['required', 'max:50', Rule::unique('restaurants')],
            'address' => ['required', 'max:100'],
            'phone' => ['required', 'max:13'],
            'image' => 'nullable',
            'vat_number' => ['required', 'max:200'],
            'type_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del ristorante è obbligatorio',
            'name.max' => 'Il nome del ristorante è troppo lungo',
            'name.unique' => 'Il nome del ristorante è già in uso',
            'address.required' => 'L\'indirizzo del ristorante è obbligatorio',
            'address.max' => 'L\'indirizzo del ristorante è troppo lungo',
            'phone.required' => 'Il numero di telefono del ristorante è obbligatorio',
            'phone.max' => 'Il numero di telefono del ristorante è troppo lungo',
            'vat_number.required' => 'La partita IVA del ristorante è obbligatoria',
            'vat_number.max' => 'La partita IVA del ristorante è troppo lunga',
            'type.required' => 'Il tipo di cucina è obbligatorio'
        ];
    }
}
