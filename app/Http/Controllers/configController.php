<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
class configController extends Controller
{	
	public function getConfig(){

        $rs = DB::select("SELECT * FROM configuracion");
        if(count($rs) > 0){
            return view("configuracion.configuracion")->with("configuracion",$rs);
        }
        else {
            return view("configuracion.configuracion");
        }
    }


    public function editarConfiguracion(Request $request){
    	$tasa = trim($request->input("tasaFinanciamiento"));
    	$enganche = trim($request->input("enganche"));
    	$plazo = trim($request->input("plazoMaximo"));
    	$clave = $request->input("clave");
    	if(isset($_POST["nuevo"])){
    		$rs=DB::table('configuracion')->insert(
    		['tasaFinanciamiento' => $tasa, 'enganche' => $enganche, 'plazoMaximo' => $plazo]);
    		$rs = DB::select("SELECT * FROM configuracion");
			return view("configuracion.configuracion")->with("messageCode", 1)->with("configuracion",$rs);
    	}
    	else if(isset($_POST["editar"])){
    		$rs=DB::table('configuracion')
            ->where('id', $clave)
            ->update(['tasaFinanciamiento' => $tasa, 'enganche' => $enganche, 'plazoMaximo' => $plazo]);
            $rs = DB::select("SELECT * FROM configuracion");
            return view("configuracion.configuracion")->with("messageCode", 1)->with("configuracion",$rs);
    	}

    	else{
    		return redirect("getConfig");
    	 }
    	
        
        
    }
}
