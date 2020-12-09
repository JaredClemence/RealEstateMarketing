<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\InteractionEvent;

class InteractionListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if( is_a( $event, InteractionEvent::class )){
            /* @var $event InteractionEvent */
            $eventRecord = $event->makeRecord();
            $eventRecord->save();
        }
    }
}
