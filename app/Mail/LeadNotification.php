<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lead;
use App\Models\Property;

class LeadNotification extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->text('emails.lead-notice');
    }
}
