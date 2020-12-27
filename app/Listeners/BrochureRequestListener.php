<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\BrochureEmail;
use App\Events\BrochureRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadNotification;
use App\Mail\VirtualTour;

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
        \Illuminate\Support\Facades\Log::debug('Sending brochure email.');
        Mail::to($email)->queue(new BrochureEmail($lead));
        Mail::to($email)->later(now()->addMinutes(1), new VirtualTour($lead));
        
        \Illuminate\Support\Facades\Log::debug('Preparing agent notification email.');
        \Illuminate\Support\Facades\Log::debug('Lead name: ' . $lead->name);
        
        \Illuminate\Support\Facades\Log::debug('str_pos (TEST): ' . strpos( $lead->name, "TEST" ));
        \Illuminate\Support\Facades\Log::debug('Mailer Test result: ' . (strpos( $lead->name, "TEST" ) === false?'true':'false'));
        if( strpos( $lead->name, "TEST" ) === false ){
            \Illuminate\Support\Facades\Log::debug('Using production path with 15 minute delay.');
            Mail::to($agentEmail)
                    ->cc("jaredclemence@gmail.com")
                    ->later( now()->addMinutes(15), new LeadNotification($lead) );
        }else{
            \Illuminate\Support\Facades\Log::debug('Using test path with zero delay.');
            Mail::to("jaredclemence@gmail.com")
                    ->send( new LeadNotification($lead) );
        }
    }
}
