<?php

namespace App\Http\Controllers;

use App\registro;
use App\Paginacion;
use App\VentaModel;
use DB;
use Exception;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login()
	{
		return view('login');
	}

	
    public function LoginValidarUsuarios(Request $request)
    {	
    	$user= $request->input('user');
    	$password= $request->input('password');
    	$consultaUser=DB::table('usuarios')->where('Nombre',$user)->get();
    	$consultaPassword=DB::table('usuarios')->where('Password',$password)->get();

    	if (count($consultaUser)>=1 && count($consultaPassword)>=1) {
    		$clientes = registro::select('id', 'Nombre','NIFCIF','Localidad')->paginate(15);
        
        	return view('clientes',array('clientes'=>$clientes));
    	}
    		
    	return view('/login');
    }

    public function LoginAdm()
	{
		return view('loginAdmin');
	}

    public function LoginAdmin(Request $request)
    {

    	$user= $request->input('user');
    	$password= $request->input('password');

    	$consultaUser=DB::table('usuarios')->where('Nombre',$user)->get();
    	$consultaPassword=DB::table('usuarios')->where('Password',$password)->get();


    	if (count($consultaUser)>=1 && count($consultaPassword)>=1) {
    		return view('/usuarios');
    	}
    	else{
    		return view('/loginAdmin');
    	}
    	
    }

    

}

	