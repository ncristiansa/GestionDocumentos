<?php

namespace App\Http\Controllers;
use App\registro;
use App\Paginacion;
use App\VentaModel;
use DB;
use Exception;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = registro::select('id', 'Nombre','NIFCIF','Localidad')->paginate(15);
        
        return view('clientes',array('clientes'=>$clientes));
    }

    public function buscar(Request $request)
    {   
        $registroBusqueda = $request->input('filtro');
        $clientes = registro::select('id', 'Nombre','NIFCIF','Localidad')->where('Nombre','like','%'.$registroBusqueda.'%')->orwhere('Localidad','like','%'.$registroBusqueda.'%')->orwhere('NIFCIF','like','%'.$registroBusqueda.'%')->paginate(15);

        
        return view('clientes',array('clientes'=>$clientes));
    }
    

    public function filtroEstadoFecha(Request $request, $id)
    {   

        $inputFecha=$request->input('filtro');
        $inputEstado=$request->input('estado');
        //dd($inputEstado);
        
        if ($inputFecha!=null && $inputEstado==null) {
            $inputFecha=$request->input('filtro');
            $inputEstado=$request->input('estado');
            $clientes = DB::table('clientes')->where('id', $id)->get();
            $venta = VentaModel::select('id', 'nombreVentas','Estado','updated_at')->where('id_cliente',$id)->where('updated_at','like',$inputFecha.'%')->get();
            return view('/cliente',array('Clientes'=>$clientes),array('infoVentas'=>$venta));
        }
        elseif ($inputFecha==null && $inputEstado!=null) {
            $inputFecha=$request->input('filtro');
            $inputEstado=$request->input('estado');
            $clientes = DB::table('clientes')->where('id', $id)->get();
            $venta = VentaModel::select('id', 'nombreVentas','Estado','updated_at')->where('id_cliente',$id)->where('Estado',$inputEstado)->get();
            return view('/cliente',array('Clientes'=>$clientes),array('infoVentas'=>$venta));
        }
        elseif ($inputFecha!=null && $inputEstado!=null) {
            $inputFecha=$request->input('filtro');
            $inputEstado=$request->input('estado');
            $clientes = DB::table('clientes')->where('id', $id)->get();
            $venta = VentaModel::select('id', 'nombreVentas','Estado','updated_at')->where('id_cliente',$id)->where('updated_at','like',$inputFecha.'%')->where('Estado',$inputEstado)->get();
            return view('/cliente',array('Clientes'=>$clientes),array('infoVentas'=>$venta));
        }
        $clientes = DB::table('clientes')->where('id', $id)->get();
        $ventas = DB::table('ventas')->where('id_cliente', $id)->get(['id','nombreVentas','Estado','updated_at']);;
        return view('cliente', ['Clientes'=>$clientes],['infoVentas'=>$ventas]);
       
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $cliente = new registro;
            $cliente->id = $request->input('id');
            $cliente->Nombre = $request->input('Nombre');
            $cliente->Email = $request->input('Email');
            $cliente->Telefono = $request->input('Telefono');
            $cliente->Direccion = $request->input('Direccion');
            $cliente->NIFCIF = $request->input('NIFCIF');
            $cliente->Provincia = $request->input('Provincia');
            $cliente->Localidad = $request->input('Localidad');
            $cliente->CP = $request->input('CP');
            $cliente->save();
            $clientes = DB::table('clientes')->paginate(15);
            //$clientes = Paginacion::paginate(15);
            return view('clientes',array('clientes'=>$clientes));
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = DB::table('clientes')->where('id', $id)->get();
        return view('/cliente', ['Clientes' => $clientes]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $clientes = DB::table('clientes')->where('id', $id)->get();
            $ventas = DB::table('ventas')->where('id_cliente', $id)->get(['id','nombreVentas','Estado','updated_at']);;
            return view('cliente', ['Clientes'=>$clientes],['infoVentas'=>$ventas]);
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, ['Nombre'=>'required', 'Email'=>'required', 'Telefono'=>'required', 'Direccion'=>'required', 'NIFCIF'=>'required', 'Provincia'=>'required','Localidad'=>'required', 'CP'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
            registro::find($id)->update($request->all());
            
            $clientes = DB::table('clientes')->where('id', $id)->get();
            return view('cliente', ['Clientes'=>$clientes]);
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
