<?php

namespace App\Models;

use App\Http\Controllers\MailerController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    //
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['usuario_id', 'title', 'message', 'leido'];

    public static function insertarRegistro($factura)
    {
        $aviso = new Notification();
        $iduser = Auth::id();
        $aviso->usuario_id = $iduser;
        $aviso->title = " Registro Nuevo" ;
        $aviso->message ="Se ha insertado un nuevo registro con codigo de factura '$factura' ";
        $aviso->leido = 0;
        $aviso->save();
        /*Mandar correo */
        $mensaje = $factura;
        MailerController::enviarMail($mensaje);
        return 0;
    }

    public static function actualizarRegistro($factura)
    {
        $aviso = new Notification();
        $iduser = Auth::id();
        $aviso->usuario_id = $iduser;
        $aviso->title = "Registro Actualizado";
        $aviso->message ="Se ha editado la factura con el codigo '$factura' ";
        $aviso->leido = 0;
        $aviso->save();
        return 0;
    }


}
