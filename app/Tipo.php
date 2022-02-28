<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps= false;

    public $fillable = [
        'id',
        'tipo',
        'precio',
        'descripcion'
    ];

    public function scopeFiltroTipo($query, $filtro){
        if(!empty($filtro)){
            $query->where('tipo','LIKE','%'.$filtro.'%')
                    ->orWhere('precio',$filtro);
        }
    }

}
