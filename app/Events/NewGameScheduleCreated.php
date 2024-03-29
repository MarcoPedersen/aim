<?php

namespace App\Events;

use App\Models\GameSchedule;
use App\Services\GameScheduleService;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewGameScheduleCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the GameSchedule instance
     *
     * @var \App\Models\GameSchedule
     */

    public $gameSchedule;

    /**
     * Create a new event instance.
     *
     * @param GameSchedule $gameSchedule
     */
    public function __construct(GameSchedule $gameSchedule)
    {
        $this->gameSchedule = $gameSchedule;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
