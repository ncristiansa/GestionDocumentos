<?php

namespace App\Http\Controllers;
use App\VentaModel;
use App\DocumentoModel;
use DB;
use Exception;
use Illuminate\Http\Request;

class ModificarController extends Controller
{
    public function index()
    {
        $documento = DocumentoModel::select('id','id_venta', 'tipo_documento', 'archivo', 'created_at', 'updated_at')->orderBy('id', 'ASC')->get();
        return view('Modificar', compact('documento'));
    }
    public function update(Request $request, $id){
       
            
            $nombrearchivo = $request->file('archivo')->getClientOriginalName();
            DB::table('documentos')->where('id',$id)->update(['archivo' =>$nombrearchivo]);
            $documento = $request->file('archivo')->storeAs('public', $nombrearchivo);
            $Ventas = DB::table('ventas')->where('id', $id)->get();
            return view('/detallesVentas', ['Ventas' => $Ventas]);
        
    }
}
