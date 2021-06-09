<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimentos';

    protected $fillable = [
        'nome','peso_padrao','carbo','proteina','gordura',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function refeicao(){
        return $this->hasMany('App\models\Refeicao', 'alimento_id');
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
