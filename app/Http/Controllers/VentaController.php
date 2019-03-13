<?php

namespace App\Http\Controllers;
use App\VentaModel;
use App\DocumentoModel;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            DocumentoModel::create($request->all());
            $nombredoc = $request->file('archivo')->getClientOriginalName();
            $documentos = new DocumentoModel;
            $documentos->archivo = $request->file('archivo')->storeAs('public', $nombredoc);
            
            
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
