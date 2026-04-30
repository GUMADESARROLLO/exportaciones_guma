<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promos extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "PRODUCCION.dbo.view_master_numero_rifa";

    public static function getInfoCliente( $codigoCliente = null) {

    // $codigoCliente = $codigoCliente ?? '00012';

    // Obtener info del cliente (una sola fila representativa)
    $InfoCliente = self::where('CLIENTE', $codigoCliente)->first();

    if (!$InfoCliente) {
        return null;
    }

    // 🔥 YA VIENE AGRUPADO DESDE LA VISTA
    $registros = self::where('CLIENTE', $codigoCliente)->get();

    $facturas = [];
    $totalComprado = 0;
    $TodasAcciones = [];

    foreach ($registros as $row) {

        // Procesar acciones (string → array)
        $accionesArray = [];
        

        if (!empty($row->ACCIONES)) {
            $numeros = explode(',', $row->ACCIONES);

            foreach ($numeros as $numero) {
                $numero = trim($numero);
                if ($numero !== '') {
                    $accionesArray[] = ['numero' => $numero];
                    $TodasAcciones[] = $numero;
                }
            }
        }

        $monto = $row->TOTAL_FACTURA ?? 0;
        $totalComprado += $monto;

        $facturas[] = [
            'folio' => $row->FACTURA ?? 'SIN_FACTURA',
            'fecha' => date('d/m/Y', strtotime($row->FECHA)) ,
            'monto' => $monto,
            'estado' => 'active',
            'estadoTexto' => 'Pagada',
            'cantidad_acciones' => count($accionesArray),
            'acciones' => $accionesArray
        ];
    }

    // Ordenar por fecha desc
    usort($facturas, function ($a, $b) {
        return strtotime(str_replace('/', '-', $b['fecha'])) - strtotime(str_replace('/', '-', $a['fecha']));
    });

    // Ordenar acciones de menor a mayor
    sort($TodasAcciones, SORT_NUMERIC);

    // Totales
    $totalAccionesCalculado = array_sum(array_column($facturas, 'cantidad_acciones'));
    
    return [
        'nombre' => $InfoCliente->NOMBRE ?? 'N/D',
        'codigo' => $InfoCliente->CLIENTE ?? 'N/D',
        'telefono' => $InfoCliente->TELEFONO1 ?? 'N/D',
        'email' => $InfoCliente->TELEFONO2 ?? 'N/D',
        'total_compras' => $totalComprado,
        'facturas' => $facturas,
        'total_facturas' => count($facturas),
        'total_acciones' => $totalAccionesCalculado,
        'Acciones' => $TodasAcciones
    ];
}
}
