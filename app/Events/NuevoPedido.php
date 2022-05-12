<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;

class NuevoPedido
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The pedido instance.
     *
     * @var App\Models\Pedido
     */
    public $pedido;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido1)
    {
        $this->pedido = $pedido1;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
