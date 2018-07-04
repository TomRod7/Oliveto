<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(){
        return [
          'name' => 'required|string',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required',
        ];
    }

    public function messages(){
      return [
        'name.required' => 'El nombre es obligatorio.',
        'email.required'  => 'El email es obligatorio.',
        'email.email'  => 'El email ingresado no es válido.',
        'phone.required'  => 'El teléfono es obligatorio.',
        'address.required'  => 'El domicilio es obligatorio.'
      ];
    }
}
