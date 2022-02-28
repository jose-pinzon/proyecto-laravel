<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps= false;

    public $fillable = [
        'id',
        'grupo_id',
        'nombre',
        'apellido',
        'email'
    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class,'grupo_id','id');
    }
    public function scopeFiltroCliente($query, $filtro){
        if(!empty($filtro)){
            $query->where('nombre','LIKE','%'.$filtro.'%')
            ->orWhere('apellido','LIKE','%'.$filtro.'%');
        }
    }
}
