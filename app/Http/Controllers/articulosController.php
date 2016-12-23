<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
class articulosController extends Controller
{	
	public function vistaArticulos(){
		$rs = DB::select("SELECT * FROM articulos");
		return view("articulos.tablaArticulos")->with("articulos",$rs);
	}

    public function getArticulo(){
    	return view("articulos/articulos");
    }

    public function postArticulo(Request $request){
    	$descripcion = $request->input("descripcion");
    	$modelo = $request->input("modelo");
    	$precio = $request->input("precio");
    	$existencia = $request->input("existencia");

    	$rs=DB::table('articulos')->insert(
    	['descripcion' => $descripcion, 'modelo' => $modelo, 'precio' => $precio, 'existencia' => $existencia]
		);

		if($rs){
			    return redirect("articulos");
		}
    }

    public function getEditarArticulo(Request $request){
    	$clave=$request->input("clave");
    	$rs = DB::select("SELECT * FROM articulos WHERE id='".$clave."'");
    	if($rs){
			    return view("articulos/editararticulo")->with("articulo", $rs);
		}
    }

    public function postEditarArticulo(Request $request){
    	$descripcion = $request->input("descripcion");
        $modelo = $request->input("modelo");
        $precio = $request->input("precio");
        $existencia = $request->input("existencia");
    	$clave = $request->input("clave");
    	$rs=DB::table('articulos')
            ->where('id', $clave)
            ->update(['descripcion' => $descripcion, 'modelo' => $modelo, 'precio' => $precio, 'existencia' => $existencia]);
    	

    	if($rs){
    			return Redirect("articulos");
		}
				return Redirect("articulos");
    }
}
