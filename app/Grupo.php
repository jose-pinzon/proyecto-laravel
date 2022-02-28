<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'id';
    public $with= ['clientes'];
    public $incrementing = true;
    public $timestamps= false;

    public $fillable = [
        'id',
        'nombre',
        'descripcion',
        'num_personas'
    ];

    public function clientes(){
        return $this->hasMany(Cliente::class,'grupo_id');
    }
}
