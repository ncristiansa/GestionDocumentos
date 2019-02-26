<?php

namespace App\Http\Controllers;


use App\Providers\registro;
use Illuminate\Http\Request;
class InsertarUsuario extends Controller
{

   public function store(Request $request)
   {
        $registro = new App\Providers\registro;

        $registro->Nombre = $request['Nom'];
        $registro->Email = $request['Email'];
        $registro->Telefono = $request['Telefono'];
        $registro->Direccion = $request['Direccio'];
        $registro->Provincia = $request['Provincia'];
        $registro->Localidad = $request['Localitat'];
        $registro->CP = $request['C.P.'];
        $registro->created_at = $request['Data'];
        $registro->updated_at = $request['Data Modificacio'];
        $registro->save();

        return "Cliente registrado.";
   }
}
