<?php

namespace App\Listeners;

use App\Events\PlayerSignup;
use App\Mail\playerGameSignupNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class FieldOwnerNotification
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
     * @param PlayerSignup $event
     * @return void
     */
    public function handle(PlayerSignup $event)
    {
        Mail::to('from@example.com')->send(new playerGameSignupNotification($event->user,$event->gameSchedule));
    }
}
