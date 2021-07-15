<?php

namespace App\Events;

use App\Models\GameSchedule;
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

    public $game_schedule;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\GameSchedule $game_schedule
     * @return void
     */
    public function __construct(GameSchedule $game_schedule)
    {
        $this->game_schedule = $game_schedule;
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
