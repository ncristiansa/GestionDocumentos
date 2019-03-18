<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable =  ['Nombre'=>'required','Password'=>'required','Apellido'=>'required','tipo_usuario'=>'required','Email'=>'email', 'Telefono' =>'min:9','created_at', 'updated_at'];
}


