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
		$name=$request->input("")
		DB::table("tabla")->insert(['name'=>$name]);
		echo "Insertado correctamente</br>";
	}
}