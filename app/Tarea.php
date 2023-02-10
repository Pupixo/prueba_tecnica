<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{

    public $table = 'tarea';
    //
    protected $fillable = [
        'tarea_nom',
        'estado',
        'image'
    ];
}
