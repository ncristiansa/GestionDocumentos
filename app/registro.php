<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $fillable = ['Nombre','Email', 'Telefono', 'Direccion', 'NIF/CIF', 'Provincia', 'Localidad', 'CP', 'created_at', 'updated_at'];
}
