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
        try
        {
            $documento = new DocumentoModel;

            $documento->archivo = $request->file('doc')->getClientOriginalName();
            $this->validate($request, ['id_venta'=>'required', 'tipo_documento'=>'required', 'archivo'=>'required', 'created_at'=>'required', 'updated_at'=>'required']);
            DB::table('documentos')->where('id',$documento->id =$request->input('id'))->update([
                'id_venta'=> $request->input('id_venta'),
                'tipo_documento'=> $request->input('tipo_archivo'),
                'archivo' => $documento
            ]);           
            return "Ok funciona";
        }catch(Exception $e)
        {
            return back()->withErrors(['Error'=>'Error del servidor']);
        }
    }
}
