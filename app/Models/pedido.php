<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pedido extends Model
{

    protected $table = 'pedido';
    protected $primaryKey = 'id';
    protected $fillable = ['id','tipo_export', 'numOrden', 'fecha_despacho', 'fecha_orden', 'codigo', 'descripcion', 'lab', 'cantidad', 'mific', 'precio_farm', 'precio_publ', 'permiso_necesario', 'consignado', 'tipo', 'comentarios', 'estado'];
    public $timestamps = false;


    public static function getPedidos()
    {

        return pedido::all();
    }
}
