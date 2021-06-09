<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = 'refeicaos';

    protected $fillable = [
        'nome','peso','usuario_id','alimento_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function usuario(){
        return $this->belongsTo('App\models\Usuario','usuario_id');
    }

    public function alimento(){
        return $this->belongsTo('App\models\Alimento', 'alimento_id');
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
