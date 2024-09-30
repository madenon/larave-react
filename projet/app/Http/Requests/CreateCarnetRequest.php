<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateCarnetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nom' => 'required',
            'email' => 'required',
            'contact' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw  new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation de données ',
            'erreroList' => $validator->errors(),
        ]));
    }

    public function  messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoir',
            'email.required' => 'L email est obligatoir',
            'contact.required' => 'Le contact est obligatoir'
        ];
    }
}
