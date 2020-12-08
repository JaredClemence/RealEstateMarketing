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
