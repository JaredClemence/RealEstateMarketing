<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Email;
use App\Models\Interaction;

abstract class InteractionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /* @var $email Email */
    public $email;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }
    
    

    abstract protected function getInteractionType();

    abstract protected function getInteractionDescription();

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    
    public function makeRecord(){
        $record = new Interaction();
        $record->type = $this->getInteractionType();
        $record->description = $this->getInteractionDescription();
        $record->email_id = $this->email->id;
        return $record;
    }
}
