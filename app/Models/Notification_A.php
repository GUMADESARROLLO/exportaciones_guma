<?php

namespace App\Models;

use App\Http\Controllers\MailerController;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Notification_A extends Model
{
    //
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['usuario_id', 'title', 'message', 'leido'];

    public static function insertarRegistro($factura)
    {
        $aviso = new Notification_A();
        $iduser = Auth::id();
        $aviso->usuario_id = $iduser;
        $aviso->title = " Registro Nuevo";
        $aviso->message = "Se ha insertado un nuevo registro con codigo de factura '$factura' ";
        $aviso->leido = 0;
        $aviso->save();
        /*Mandar correo */
        $data = $factura;
        MailerController::enviarMail($data);
        return 0;

    }

    public static function actualizarRegistro($factura)
    {
        $aviso = new Notification_A();
        $iduser = Auth::id();
        $aviso->usuario_id = $iduser;
        $aviso->title = "Registro Actualizado";
        $aviso->message = "Se ha editado la factura con el codigo '$factura' ";
        $aviso->leido = 0;
        $aviso->save();
        return 0;
    }
}
