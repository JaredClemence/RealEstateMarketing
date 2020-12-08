<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\VirtualTour;
use App\Models\Lead;
use App\Jobs\AbstractLeadJob;

class SendVirtualTour extends AbstractLeadJob implements ShouldQueue
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if( $this->clientDidNotOptOut() ){
            Mail::to($this->recipient)
                    ->send(new VirtualTour($this->lead));
        }
    }
}
