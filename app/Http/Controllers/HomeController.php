<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\pedido;
use App\Models\Articulos;
use App\Traits\ModelScopes;
use Illuminate\Support\Facades\DB;
use Exception;

class HomeController extends Controller
{
    use ModelScopes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getData()
    {
        $pedido = pedido::getPedidos();
        //$pedido = Articulos::getArticulos();
        return response()->json($pedido);
    }
    public function getArti()
    {
        $Articulos = Articulos::getArticulos();
        return response()->json($Articulos);
    }
    public function guardar(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {
                $data = $request->input('array');
                $array = array();
                $i= 0;
                foreach ($data as $dataP) {
                    $array[$i]['numOrden']           =   $dataP['numOrden'];
                    $array[$i]['fecha_despacho']     =   $dataP['fecha_despacho'];
                    $array[$i]['fecha_orden']        =   $dataP['fecha_orden'];
                    $array[$i]['codigo']             =   $dataP['codigo'];
                    $array[$i]['descripcion']        =   $dataP['descripcion']  ;
                    $array[$i]['lab']                =   $dataP['lab'];
                    $array[$i]['cantidad']           =   $dataP['cantidad'];
                    $array[$i]['mific']              =   $dataP['mific'];
                    $array[$i]['precio_farm']        =   $dataP['precio_farm'];
                    $array[$i]['precio_publ']        =   $dataP['precio_publ'];
                    $array[$i]['permiso_necesario']  =   $dataP['permiso_necesario'];
                    $array[$i]['consignado']         =   $dataP['consignado'];
                    $array[$i]['tipo']               =   $dataP['tipo'];
                    $array[$i]['comentarios']        =   $dataP['comentarios'];
                    $array[$i]['estado']             =   $dataP['estado'];             //actualizar detalles de la requisa
                    
                };
                $pedido = new pedido();
                $pedido->save();
                //return redirect()->back()->with('message-success', 'Se creo la Requisa con exito :)');

                return response()->json($pedido);
            });
        } catch (Exception $e) {
            $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";

            return response()->json($mensaje);
        }
    }

    public function cambiarEstado()
    {
        
    }
}
