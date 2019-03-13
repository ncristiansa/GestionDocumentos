<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaModel extends Model
{
    protected $table = 'ventas';
    protected $fillable =  ['id_cliente','Comprador', 'nombreVentas'];

}
