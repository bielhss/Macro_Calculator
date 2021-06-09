<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefeicaoRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => 'required|string|max:100',
            'peso'=> 'required|numeric',
            
        ];
    }
}
