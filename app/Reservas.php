<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservaciones';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps= true;

    public $fillable = [
        'id',
        'habitacion_id',
        'usuario_id',
        'grupo_id',
        'costo',
        'fecha_entrada',
        'fecha_salida',
        'cortesia',
        'extras',
        'estado'
    ];

    public function habitacion(){
        return $this->belongsTo('App\Habitacion','habitacion_id');
    }
    public function usuario(){
        return $this->belongsTo('App\User','usuario_id');
    }
    public function grupos(){
        return $this->belongsTo('App\Grupo','grupo_id');
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class,'grupo_id','id');
    }


}
