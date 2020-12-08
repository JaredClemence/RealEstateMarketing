<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\BrochureEmail;
use App\Events\BrochureRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadNotification;

class BrochureRequestListener
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
    public function handle(BrochureRequest $event)
    {
        $lead = $event->lead;
        /* @var $lead Lead */
        $email = $lead->email;
        $property = $lead->property;
        $agentEmail = $_ENV['AGENT_EMAIL'];
        Mail::to($email)->queue(new BrochureEmail($lead));
        if( strpos( "TEST", $lead->name ) === false ){
            Mail::to($agentEmail)
                    ->cc("jaredclemence@gmail.com")
                    ->later( now()->addMinutes(15), new LeadNotification($lead) );
        }else{
            Mail::to("jaredclemence@gmail.com")
                    ->send( new LeadNotification($lead) );
        }
    }
}
