<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table = 'clientes';
    protected $fillable =  ['Nombre','Email', 'Telefono', 'Direccion', 'NIFCIF', 'Provincia', 'Localidad', 'CP', 'created_at', 'updated_at'];
}
