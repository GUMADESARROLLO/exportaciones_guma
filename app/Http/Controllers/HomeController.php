<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\pedido;
use App\Models\Notification_A;
use App\Models\Notification_B;
use App\Models\ArticulosUMK;
use App\Models\ArticulosGP;
use App\Models\Laboratorios;
use App\Models\Consignados;
//use App\Models\Notification as ModelsNotification;
use App\Traits\ModelScopes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
//use Illuminate\Notifications\Notification;
use Carbon\Carbon;


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
    public function getArtiUMK()
    {
        $Articulos = ArticulosUMK::getArticulos();
        return response()->json($Articulos);
    }
    public function getArtiGP()
    {
        $Articulos = ArticulosUMK::getArticulos();
        return response()->json($Articulos);
    }
    public function getLab()
    {
        $Laboratorios = Laboratorios::getLaboratorios();
        return response()->json($Laboratorios);
    }
    public function getConsig()
    {
        $Consignados = Consignados::getConsignados();
        return response()->json($Consignados);
    }
    public function guardar(Request $request)
    {
        try {
            $message = DB::transaction(function () use ($request) {
                $data = $request->input('data');
                $array = array();
                $i = 0;
                $pedido = new Pedido();
                foreach ($data as $dataP) {
                    $pedido->numOrden           =   $dataP['orden'];
                    $pedido->numFactura         =   $dataP['factura'];
                    $pedido->fecha_despacho     =   $dataP['fecha_despacho'];
                    $pedido->fecha_orden        =   $dataP['fecha_orden'];
                    $pedido->codigo             =   $dataP['codigo'];
                    $pedido->empresa            =   $dataP['empresa'];
                    $pedido->descripcion        =   $dataP['descripcion'];
                    $pedido->lab                =   $dataP['lab'];
                    $pedido->cantidad           =   $dataP['cantidad'];
                    $pedido->mific              =   $dataP['mific'];
                    $pedido->precio_farm        =   $dataP['precio_farm'];
                    $pedido->precio_publ        =   $dataP['precio_public'];
                    $pedido->precio_inst        =   $dataP['precio_institu'];
                    $pedido->permiso_necesario  =   $dataP['permiso_necesario'];
                    $pedido->consignado         =   $dataP['consignado'];
                    $pedido->tipo               =   $dataP['tipo'];
                    $pedido->comentarios        =   $dataP['comentarios'];
                    $pedido->estado             =   $dataP['estado'];
                    $pedido->activo             =   "S";
                    $pedido->nuevo              =   $dataP['nuevo'];
                    $pedido->save();
                };
                return response()->json($pedido);
            });
        } catch (Exception $e) {
            $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
            return response()->json($mensaje);
        }
        //dd($message);
        if ($message) {
            $data = $request->input('data');
            $factura = $data[0]['factura'];
            
            Notification_A::insertarRegistro($factura);
            Notification_B::insertarRegistro($factura);
        }
    }
    public function editar(Request $request)
    {
        //$data = $request->input('data');
        //dd($data[0]['factura']);
        try {
            $message = DB::transaction(function () use ($request) {
                $data = $request->input('data');
                $array = array();
                $i = 0;
                $pedido = new Pedido();
                foreach ($data as $dataP) {
                    Pedido::where('id', $dataP['id'])->update([
                        'numOrden' =>   $dataP['orden'],
                        'numFactura' => $dataP['factura'],
                        'fecha_despacho' => date("Y-m-d", strtotime($dataP['fecha_despacho'])),
                        'fecha_orden' => date("Y-m-d", strtotime($dataP['fecha_orden'])),
                        'codigo' => $dataP['codigo'],
                        'descripcion' => $dataP['descripcion'],
                        'lab' => $dataP['lab'],
                        'cantidad' => $dataP['cantidad'],
                        'mific' => $dataP['mific'],
                        'precio_farm' => $dataP['precio_farm'],
                        'precio_publ' => $dataP['precio_public'],
                        'permiso_necesario' => $dataP['permiso_necesario'],
                        'consignado' => $dataP['consignado'],
                        'tipo' => $dataP['tipo'],
                        'comentarios' => $dataP['comentarios'],
                        'estado' => $dataP['estado'],
                        'empresa' => $dataP['empresa'],
                        'nuevo' => $dataP['nuevo']
                    ]);
                };
                return response()->json($pedido);
            });
        } catch (Exception $e) {
            $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
            return response()->json($mensaje);
        }
        //dd($message);
        if ($message) {
            $data = $request->input('data');
            $factura = $data[0]['factura'];
            Notification_A::actualizarRegistro($factura);
            Notification_B::actualizarRegistro($factura);
        }
    }

    public function cambiarEstado(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $data = $request->input('data');
                $array = array();
                $i = 0;

                foreach ($data as $dataP) {

                    pedido::where('id', $dataP['id'])->update([
                        'activo' => 'N',
                    ]);
                };
                return response()->json($pedido);
            });
        } catch (Exception $e) {
            $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";

            return response()->json($mensaje);
        }
    }

    public function getAllnotificaciones()
    {
        $data = array();
        $i = 0;
        $notificaciones = Notification_A::select('notifications.*', 'users.nombre', 'users.apellido')
            ->join('users', 'users.id', '=', 'notifications.usuario_id')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($notificaciones as $dataN) {
            $data[$i]['id']            = $dataN['id'];
            $data[$i]['user_id']       = $dataN['usuario_id'];
            $data[$i]['title']         = $dataN['title'];
            $data[$i]['message']       = $dataN['message'];
            $data[$i]['leido']         = $dataN['leido'];
            $data[$i]['created_at']    = carbon::parse($dataN['created_at'])->diffForHumans();
            $data[$i]['updated_at']    = $dataN['updated_at'];
            $data[$i]['nombre']        = $dataN['nombre'];
            $data[$i]['apellido']      = $dataN['apellido'];
            $i++;
        }


        return $data;
    }

    public function updateState()
    {
        $notificaciones = Notification_A::where('leido', 0)
            ->update([
                'leido' => 1,
            ]);

        return $notificaciones;
    }
}
