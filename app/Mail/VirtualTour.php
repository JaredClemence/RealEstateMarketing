<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\AbstractLeadMailer;

class VirtualTour extends AbstractLeadMailer
{
    public function __construct(Lead $lead) {
        $type = "VIRTUAL_TOUR_EMAIL";
        $description = "An email with a link to the 3D virtual tour.";
        parent::__construct($lead, $type, $description);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->makeSubjectLine();
        return $this->to($this->recipient)
                ->subject($subject)
                ->text('emails.virtual-tour');
    }

    protected function makeSubjectLine() {
        $formattedAddress = $this->buildAddress();
        return "[Virtual Tour] $formattedAddress";
    }

}
