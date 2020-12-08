<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lead;
use App\Models\Property;

abstract class AbstractLeadMailer extends Mailable
{
    use Queueable, SerializesModels;

    /* @var $lead Lead */
    public $lead;
    /* @var $property Property */
    public $property;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead->withoutRelations();
        $this->property = $lead->property->withoutRelations();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    abstract public function build();
    
    protected function buildAddress(){
        $street = $this->property->address;
        $city = $this->property->city;
        $state = $this->property->state;
        $zip = $this->property->zip;
        return "{$street}; $city, $state $zip";
    }
}
