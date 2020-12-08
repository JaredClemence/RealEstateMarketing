<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\AbstractLeadMailer;

class VirtualTour extends AbstractLeadMailer
{

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $formattedAddress = $this->buildAddress();
        return $this->to($this->recipient)
                ->subject("[Virtual Tour] $formattedAddress")
                ->text('emails.virtual-tour');
    }
}
