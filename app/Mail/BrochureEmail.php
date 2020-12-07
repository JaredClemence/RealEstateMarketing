<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Property;
use App\Models\Lead;

class BrochureEmail extends Mailable
{
    use Queueable, SerializesModels;

    /* @var $property Property */
    public $property;
    /* @var $lead Lead */
    public $lead;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Property $property, Lead $lead)
    {
        $this->property = $property->withoutRelations();
        $this->lead = $lead->withoutRelations();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->lead->name;
        $address = $this->property->address;
        $city = $this->property->city;
        $state = $this->property->state;
        $zip = $this->property->zip;
        
        $viewData = compact('name','address','city','state','zip');
        
        return $this->text('emails.brochure')
                ->with($viewData)
                ->attach(public_path($this->property->brochure), ['as'=>'brochure.pdf', 'mime/type'=>'pdf'])
                ->subject("[eBrochure] $address; $city, $state $zip");
    }

}
