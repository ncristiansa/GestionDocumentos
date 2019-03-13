<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoModel extends Model
{
    protected $table = 'documentos';
    protected $fillable = ['id_venta', 'tipo_documento', 'archivo', 'created_at', 'updated_at'];
}
