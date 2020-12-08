<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lead;
use App\Models\Property;
use App\Mail\AbstractLeadMailer;

class LeadNotification extends AbstractLeadMailer
{

    public $name;
    public $phone;
    public $email;
    
    public $address;
    public $city;
    public $state;
    public $zip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $type = "ADMIN_NOTICE_NEW_LEAD";
        $description = "An email with details about the new lead.";
        parent::__construct($lead, $type, $description);
        
        $property = $lead->property;
        /* @var $property Property */
        $this->name = $lead->name;
        $this->phone = $lead->phone;
        $this->email = $lead->email;
        $this->address = $property->address;
        $this->city = $property->city;
        $this->state = $property->state;
        $this->zip = $property->zip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $agentName = $_ENV['AGENT_NAME'];
        return $this->text('emails.lead-notice')->with(compact('agentName'));
    }

    protected function makeSubjectLine() {
        return 'Lead Notification';
    }

}
