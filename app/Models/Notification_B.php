<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Usuario;


class Notification_B extends Model
{    
    protected $table = 'gumanet.notifications';
    public $timestamps = true;
    protected $fillable = ['usuario_id','nombre', 'title', 'message', 'leido'];


    public static function insertarRegistro($factura)
    {

        $notificacion = new Notification_B();
        $iduser = Auth::id();
        $notificacion->usuario_id = $iduser;
        $usuario = Usuario::select('nombre')->where('id',  $iduser)->get()->first();
        $notificacion->nombre = $usuario->nombre. ' ' . $usuario->nombre;
        $notificacion->title  = " Registro Nuevo";
        $notificacion->message = "Se ha insertado un nuevo registro con codigo de factura '$factura' ";
        $notificacion->leido = 0;
        $notificacion->save();  
        return 0;
    }

    public static function actualizarRegistro($factura)
    {

        $notificacion = new Notification_B();
        $iduser = Auth::id();
        $notificacion->usuario_id = $iduser;
        $name = Usuario::select('nombre','apellido')->where('id',  $iduser)->get()->first();
        $notificacion->nombre = $name->nombre . ' '. $name->apellido;
        $notificacion->title = " Registro Actualizado";
        $notificacion->message = "Se ha editado la factura con el codigo '$factura' ";
        $notificacion->leido = 0;
        $notificacion->save();
        return 0;
    }
}
