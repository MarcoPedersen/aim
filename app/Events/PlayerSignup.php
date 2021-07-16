<?php

namespace App\Events;

use App\Models\GameSchedule;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerSignup
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the user instance
     *
     * @var \App\Models\User
     */

    public $user;
    public $gameSchedule;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param \App\Models\GameSchedule $gameSchedule
     * @return void
     */

    public function __construct(User $user, GameSchedule $gameSchedule)
    {
        $this->user = $user;
        $this->gameSchedule = $gameSchedule;
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
