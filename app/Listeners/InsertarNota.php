<?php

namespace App\Listeners;

use App\Events\NuevoPedido;
use App\Models\Notification_A;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class InsertarNota
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NuevoPedido  $event
     * @return void
     */
    public function handle(NuevoPedido $event)
    {
        //
        $pedidoinfo = $event->pedido;
        $aviso = new Notification_A();
        $iduser = Auth::id();
        //$registro = $request['id'] ;
        $aviso->usuario_id = $iduser;
        $aviso->leido = 0;
        $aviso->message ="Se ha editado el registro con id ";
        //dd($aviso);
        $aviso->save();
        return $aviso;
    }
}
