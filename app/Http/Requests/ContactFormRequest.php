<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
          'message' => 'required|min:10',
        ];
    }

    public function messages(){
      return [
        'name.required' => 'El nombre es obligatorio.',
        'email.required'  => 'El email es obligatorio.',
        'email.email'  => 'El email ingresado no es válido.',
        'phone.required'  => 'El teléfono es obligatorio.',
        'message.required'  => 'El mensaje es obligatorio.',
        'message.min'  => 'El mensaje es muy corto.',
      ];
    }
}
