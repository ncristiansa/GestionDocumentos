<?php

namespace App\Http\Controllers;
use App\VentaModel;
use App\DocumentoModel;
use App\registro;
use DB;
use Exception;
use Illuminate\Http\Request;
use Input;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ventas = VentaModel::select('id', 'id_cliente', 'Comprador', 'nombreVentas')->orderBy('id', 'ASC')->get();
        $Documentos = DB::table('documentos')->get();
        return view('detallesVentas', compact('Ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $Ventas = DB::table('ventas')->where('id', $id)->get();
        return view('/detallesVentas', ['Ventas' => $Ventas]);

    }
    /**
     * 
     */
    public function addSale($id)
    {
        $clientes = DB::table('clientes')->where('id', $id)->get();
        return view('/NuevaVenta', ['Clientes' => $clientes]);
    }
    public function saveSale(Request $request,$id)
    {
        try
        {
        $venta = new VentaModel;
        $venta->id_cliente = $id;
        $venta->Comprador = $request->input('comprador');
        $venta->nombreVentas = $request->input('nombreventa');
        $venta->save();
        $clientes = DB::table('clientes')->where('id', $id)->get();
        return view('/cliente', ['Clientes' => $clientes]);
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {

            $documento = new DocumentoModel;
            $documento->id_venta = $id;
            $documento->tipo_documento = $request->input('tipo_archivo');
            $documento->archivo = $request->file('archivo')->getClientOriginalName();
            $documento->save();
            $nombredoc = $request->file('archivo')->getClientOriginalName();
            $documento->archivo = $request->file('archivo')->storeAs('public', $nombredoc);
            /*
            
            $documentos = new DocumentoModel;
            
            */
            
            $Ventas = DB::table('ventas')->where('id', $id)->get();
            return view('/detallesVentas', ['Ventas' => $Ventas]);
        } catch (Exception $e) {
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
        $Ventas = DB::table('ventas')->where('id', $id)->get();
        return view('/detallesVentas', ['Ventas' => $Ventas]);
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
        
        DocumentoModel::find($id)->update($request->all());
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
