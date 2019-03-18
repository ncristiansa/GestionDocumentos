<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paginacion extends Model
{
    protected $table = 'clientes';
    protected $fillable =  ['Nombre'];
}
