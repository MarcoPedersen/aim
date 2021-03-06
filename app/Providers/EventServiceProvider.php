<?php

namespace App\Providers;

use App\Events\PlayerSignup;
use App\Events\UserCreated;
use App\Events\NewGameScheduleCreated;
use App\Listeners\EmailNotification;
use App\Listeners\FieldOwnerNotification;
use App\Listeners\NewGameNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            EmailNotification::class
        ],
        NewGameScheduleCreated::class => [
            NewGameNotification::class
        ],
        PlayerSignup::class => [
            FieldOwnerNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
