<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\BrochureRequest;
use App\Listeners\BrochureRequestListener;
use App\Events\EmailOpenedEvent;
use App\Events\LinkFollowedEvent;
use App\Listeners\InteractionListener;
use Illuminate\Mail\Events\MessageSent;
use App\Listeners\RecordMailToLeads;

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
        BrochureRequest::class => [
            BrochureRequestListener::class,
        ],
        EmailOpenedEvent::class => [
            InteractionListener::class,
        ],
        LinkFollowedEvent::class => [
            InteractionListener::class,
        ],
        MessageSent::class => [
            RecordMailToLeads::class,
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
