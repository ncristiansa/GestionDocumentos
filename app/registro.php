<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table = 'clientes';
    protected $fillable =  ['Nombre'=>'required','Email'=>'email', 'Telefono' =>'min:9', 'Direccion'=>'required', 'NIFCIF', 'Provincia'=>'required','Localidad'=>'required', 'CP'=>'required', 'created_at', 'updated_at'];
}
