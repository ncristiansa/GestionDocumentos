<?php

namespace App\Http\Controllers;


use App\Providers\registro;
use Illuminate\Http\Request;
class InsertarUsuario extends Controller
{
   public function create(Request $request)
   {
      return $request->all();
   }
}
