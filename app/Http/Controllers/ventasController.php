<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
class ventasController extends Controller
{	
    public function getVentas(){
        $rs=DB::select("SELECT clientes.nombre, clientes.aPaterno, clientes.aMaterno, clientes.id as idCliente, ventas.id as idVenta,ventas.fecha,ventas.total, ventas.estatus FROM ventas INNER JOIN clientes on ventas.idCliente= clientes.id");
        return view("ventas.tablaVentas")->with("ventas",$rs);
    }

    public function nuevaVenta(){
        return view("ventas.nuevaVenta");
    }

    public function buscarCliente(Request $request){
        $buscarCliente= $request->input("key");
        if($buscarCliente == ""){
        return false;
        }
        $rs=DB::select("SELECT * FROM clientes WHERE nombre like '".$buscarCliente."%'");
        return $rs;

    }

    public function buscarArticulo(Request $request){
        $buscarArticulo= $request->input("key");
        if($buscarArticulo == ""){
        return false;
        }
        $rs=DB::select("SELECT * FROM articulos WHERE descripcion like '".$buscarArticulo."%'");
        return $rs;

    }

    public function findArticulo(Request $request){
        $clave= $request->input("clave");
        $rs=DB::select("SELECT * FROM articulos WHERE id=".$clave."");
        if($rs){
        if($rs[0]->existencia > 0){
            return $rs;
        }
        else{ return 0;}
        }

    }

    public function obtenerConfig(){
        $rs= DB::select("SELECT * FROM configuracion");
        return $rs;
    }

     public function checkExistencia(Request $request){
        $clave= $request->input("clave");
        $rs=DB::select("SELECT * FROM articulos WHERE id=".$clave."");
        return $rs;
    }

    public function guardarVenta(Request $request){
        $clave = trim($request->input("clave"));
        $total = trim($request->input("total"));
        $cantidad = $request->input("cantidad");
        $claveArticulo=$request->input("claveArticulo");
        $rs=DB::table('ventas')->insert(
        ['idCliente' => $clave, 'total' => $total, 'fecha' => date("d-m-Y")]
        );
        if($rs){
            DB::table('articulos')->where("id",$claveArticulo)->decrement('existencia',5);
            return 1;
        }
    }
}
