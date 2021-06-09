<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nome' => 'required|string|max:100',
            'data_nascimento'=> 'required',
            'sexo'=> 'required|string|min:1|max:1',
            'email'=> 'required|string|email|max:100',
            'telefone_celular'=> 'required|string|max:20',
            'senha'=>'required|string|max:20',
            'confirmar_senha'=>'required|string|max:20',
        ];
    }
}
