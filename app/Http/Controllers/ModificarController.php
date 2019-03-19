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

    public function descargarFichero($fichero){
        $file_path = public_path()."/storage/".$fichero;
        return response()->download($file_path);
        
    }

    public function update(Request $request, $id){
        try
        {
            
            $nombrearchivo = $request->file('archivo')->getClientOriginalName();
            $nombreAnterior = $request->input('DocumentoNombre');
            \File::delete(public_path('uploads/public/'.$nombreAnterior));
            DB::table('documentos')->where('id',$id)->update(['archivo' =>$nombrearchivo]);
            $documento= $request->file('archivo')->storeAs('public', $nombrearchivo);
            //$Ventas = DB::table('ventas')->where('id', $id)->get();
            //return view('/detallesVentas', ['Ventas' => $Ventas]);
            return back();
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
    }
}
