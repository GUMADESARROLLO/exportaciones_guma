<?php

namespace App\Listeners;

use App\Events\ActualizarPedido;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InsertarNotaEdicion
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
     * @param  ActualizarPedido  $event
     * @return void
     */
    public function handle(ActualizarPedido $event)
    {
        //
    }
}
