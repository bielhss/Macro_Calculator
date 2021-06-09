<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlimentoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nome' => 'required|string|max:100',
            'peso_padrao'=> 'required|numeric',
            'carbo'=> 'required|numeric',
            'proteina'=> 'required|numeric',
            'gordura'=> 'required|numeric',
        ];
    }
}
