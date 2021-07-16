<?php

namespace App\Listeners;

use App\Events\NewGameScheduleCreated;
use App\Mail\GameScheduleNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewGameNotification
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
     * @param \App\Events\NewGameScheduleCreated $event
     * @return void
     */
    public function handle(NewGameScheduleCreated $event)
    {
        Mail::to('from@example.com')->send(new GameScheduleNotification($event->gameSchedule));
    }
}
