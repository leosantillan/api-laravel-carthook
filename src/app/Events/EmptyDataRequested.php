<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmptyDataRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data = [];
    public $type = '';

    /**
     * Create a new event instance.
     *
     * @param array $data
     * @param string $type
     *
     * @return void
     */
    public function __construct(array $data, string $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
