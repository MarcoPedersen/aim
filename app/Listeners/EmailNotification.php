<?php

namespace App\Listeners;

use App\Event\UserCreated;
use App\Mail\MailtrapExample;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailNotification
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
     * @param \App\Events\UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        Mail::to('1ty.marcopedersen@gmail.com')->send(new MailtrapExample($event->user));
    }
}
