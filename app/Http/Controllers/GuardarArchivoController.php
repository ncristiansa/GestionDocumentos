<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VentaModel;
use DB;
use Exception;

class GuardarArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura = VentaModel::select('id', 'id_venta', 'archivo');
        return view('/detallesVentas/', compact('factura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detallesVentas');
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
            $factura = new VentaModel;
            $factura->id_venta = $request->input('id_venta');
            $factura->archivo = $request->input('archivo');
            $factura->save();
            $facturas = VentaModel::select('id','id_venta','archivo')->get();
            return view('detallesVentas/{id}', ['factura'=>$facturas]);
           
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
