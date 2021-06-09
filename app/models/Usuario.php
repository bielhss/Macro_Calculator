<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nome','data_nascimento','sexo','email','telefone_celular','senha','profile_pic',
    ];
     protected $hidden = [
         'created_at',
        'updated_at',
     ];


    public function refeicao(){
        return $this->hasMany('App\models\Refeicao', 'usuario_id');
    }


    public function search($filter = null)
    {

        $results = $this->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }
}
