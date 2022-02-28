<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id';
    public $with=['tipo','reservaciones'];
    public $incrementing = true;
    public $timestamps= false;

    public $fillable = [
        'id',
        'tipo_id',
        'numero',
        'ubicacion',
        'precio',
        'estado',
        'descripcion',
        'capacidad'
    ];
    // cuando se hace una relacion de tablas hay diferenrentes maneras de enlazarlos

    // esta de belongsto la relacion se hace asi  porque la clave primaria esta dentro de nuestro modelo
    public function tipo(){
        return $this->belongsTo(Tipo::class,'tipo_id');
    }

    // esta de belongsto la relacion se hace asi porque la clave foranea esta en la tabla relacionada y de la manera anterior nos dara null
    public function reservaciones(){
        return $this->hasMany(Reservas::class);
    }

    public function scopeFiltroHabitacion($query, $filtro){

        if(!empty($filtro)){
            $query->where('numero',$filtro)
            ->orWhere('ubicacion','LIKE','%'.$filtro.'%');
        }
    }


}
