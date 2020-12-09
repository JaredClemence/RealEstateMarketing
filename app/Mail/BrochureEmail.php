<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Property;
use App\Models\Lead;
use App\Mail\AbstractLeadMailer;

class BrochureEmail extends AbstractLeadMailer
{
    public function __construct(Lead $lead) {
        $type = "BROCHURE_EMAIL";
        $description = "An email with a PDF attachment describing the property.";
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
        $viewData = $this->getViewData();
        return $this->view('emails.brochure')
                ->text('emails.text.brochure')
                ->with($viewData)
                ->attach(public_path($this->property->brochure), ['as'=>'brochure.pdf', 'mime/type'=>'pdf'])
                ->subject($subject);
    }

    protected function makeSubjectLine() {
        $name = $this->lead->name;
        $address = $this->property->address;
        $city = $this->property->city;
        $state = $this->property->state;
        $zip = $this->property->zip;
        return "[eBrochure] $address; $city, $state $zip";
    }
    
    protected function getViewData(){
        $name = $this->lead->name;
        $address = $this->property->address;
        $city = $this->property->city;
        $state = $this->property->state;
        $zip = $this->property->zip;
        $viewData = compact('name','address','city','state','zip');
        return $viewData;
    }

}
