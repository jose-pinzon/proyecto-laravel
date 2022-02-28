<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps= true;

    public $fillable = [
        'id',
        'descripcion',
        'created_at',
        'updated_at',
    ];

}
