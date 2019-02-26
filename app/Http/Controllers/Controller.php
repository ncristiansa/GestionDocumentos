<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


class InsertarUsuario extends BaseController
{
	public function insertform(){
		return view("formulario")
	}

	public function insert(Request $request){
		$name=$request->input("Nom")
		$email=$request->input("Email")
		$telelfono=$request->input("Telefon")
		$direccio=$request->input("Direccio")
		$nifcif=$request->input("NIF/CIF")
		$provincia=$request->input("Provincia")
		$localidad=$request->input("Localitat")
		$cp=$request->input("C.P.")
		$created=$request->input("Data")
		$updated=$request->input("Data Modificacio")

		DB::table("clientes")->insert(['Nombre'=>$name],['Email']=>$email,['Telefono']=>$telefono,['Direccio']=>$direccio,['NIF/CIF']=>$nifcif,['Provincia']=>$provincia,['Localidad']=>$localidad,['CP']=>$cp,['created_at']=>$created,['updated_at']=>$updated);
		echo "Insertado correctamente</br>";
	}
}