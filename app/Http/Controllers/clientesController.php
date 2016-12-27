<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
class clientesController extends Controller
{	
	public function vistaClientes(){
		$rs = DB::select("SELECT * FROM clientes");
		return view("clientes.tablaClientes")->with("clientes",$rs);
	}

    public function getCliente(){
    	return view("clientes/clientes");
    }

    public function postCliente(Request $request){
    	$nombre = $request->input("nombre");
    	$aPaterno = $request->input("aPaterno");
    	$aMaterno = $request->input("aMaterno");
    	$RFC = $request->input("RFC");

    	$rs=DB::table('clientes')->insert(
    	['nombre' => $nombre, 'aPaterno' => $aPaterno, 'aMaterno' => $aMaterno, 'RFC' => $RFC]
		);

		if($rs){
			    return redirect("clientes");
		}
    }

    public function getEditarCliente(Request $request){
    	$clave=$request->input("clave");
    	$rs = DB::select("SELECT * FROM clientes WHERE id='".$clave."'");
    	if($rs){
			    return view("clientes/editarCliente")->with("cliente", $rs);
		}
    }

    public function postEditarCliente(Request $request){
    	$nombre = $request->input("nombre");
    	$aPaterno = $request->input("aPaterno");
    	$aMaterno = $request->input("aMaterno");
    	$RFC = $request->input("RFC");
    	$clave = $request->input("clave");
    	$rs=DB::table('clientes')
            ->where('id', $clave)
            ->update(['nombre' => $nombre, 'aPaterno' => $aPaterno, 'aMaterno' => $aMaterno, 'RFC' => $RFC]);
    	

    	if($rs){
    			return Redirect("clientes");
		}
				return Redirect("clientes");
    }

    public function obtenerFolioCliente(){
        $rs=DB::select("SELECT id FROM clientes ORDER BY id DESC LIMIT 1");
        return $rs;
    }
}
