<?php

namespace App\Listeners;

use App\Events\NuevoPedido;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarEmail
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
    }
}
