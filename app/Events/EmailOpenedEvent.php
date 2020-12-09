<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Events\InteractionEvent;

class EmailOpenedEvent extends InteractionEvent {

    protected function getInteractionDescription() {
        return "An image was requested from the HTML version of this email when it was openned. (Note: This does not track the text versions of the email messages.)";
    }

    protected function getInteractionType() {
        return "EMAIL_OPEN";
    }

}
