<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:255',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve essere lungo al massimo :max caratteri',
            'description.required' => 'La descrizione é obbligatoria',
            'thumb.required' => 'L\'immagine é obbligatoria',
            'price.required' => 'Il prezzo é obbligatorio',
            'series.required' => 'La serie é obbligatoria',
            'series.max' => 'La serie deve essere lunga al massimo :max caratteri',
            'sale_date.required' => 'La data di vendita é obbligatoria',
            'type.required' => 'Il tipo é obbligatorio',
        ];
    }
}
