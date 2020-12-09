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

class LinkFollowedEvent extends InteractionEvent {

    protected function getInteractionDescription() {
        return "LINK_CLICKED";
    }

    protected function getInteractionType() {
        return "The user clicked a link provided in the email message.";
    }

}
