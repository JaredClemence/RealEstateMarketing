<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Events\MessageSent;
use Swift_Message;

class RecordMailToLeads
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
        /* @var $event MessageSent */
        if( is_a($event->data['lead'], \App\Models\Lead::class)){
            $lead = $event->data['lead'];
            $subject = $event->message->getSubject();
            $toList = $event->message->getTo();
            $ccList = $event->message->getCc();
            if( is_array( $ccList ) ){
                $toList = array_merge( $toList, $ccList );
            }
            $to = implode(", ", array_merge(array_keys($toList)));
            $body = $event->message->getBody();
            $emailRecord = new \App\Models\Email();
            $emailRecord->id = $event->data['mail_id'];
            $emailRecord->subject = $subject;
            $emailRecord->type = $event->data['type'];
            $emailRecord->description = $event->data['description'];
            $emailRecord->lead_id = $lead->id;
            $emailRecord->sent_to = $to;
            $emailRecord->body = $body;
            $emailRecord->save();
        }
    }
}
