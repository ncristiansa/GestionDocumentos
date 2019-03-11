<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaModel extends Model
{
    protected $table = 'factura';
    protected $fillable =  ['id_venta','archivo', 'created_at', 'updated_at'];

}
