<?php

namespace App\Http\Controllers;
use App\Models\Nota;

use Illuminate\Http\Request;
class NotaController extends Controller
{
    public function index(){
        $datos=Nota::paginate(12);
        return view('nota',compact('datos'));
    }
    public function detalle($id){
        $dato=Nota::findOrFail($id);
        return view('detalle',compact('dato'));
    }
    public function post_agregar(Request $request){
        /* return $request->all(); sirve para verificar */
        $request->validate([
            'titulo'=>'required',
            'descripcion'=>'required'
        ]);
        $datoNuevo=new Nota;
        $datoNuevo->titulo=$request->titulo;
        $datoNuevo->descripcion=$request->descripcion;
        $datoNuevo->save();
        return back()->with('mensaje','Se Agrego Correctamente La Nota. !');
    }
    public function put_editar(Request $request,$id){
        $request->validate([
            'titulo'=>'required',
            'descripcion'=>'required'
        ]);
        $notaActualizado=Nota::findOrFail($id);
        $notaActualizado->titulo=$request->titulo;
        $notaActualizado->descripcion=$request->descripcion;
        $notaActualizado->save();
        return back()->with('mensaje','Se Actualizo Correctamente La Nota. !');


    }
    public function delete($id){
        $notaDelete=Nota::findOrFail($id);
        $notaDelete->delete();
        return back()->with('mensaje','Se Elimino Correctamente La Nota !');
    }
}
