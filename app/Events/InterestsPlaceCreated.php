<?php

namespace App\Events;

use App\Models\InterestsPlace;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InterestsPlaceCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $interestsPlace;
    /**
     * Create a new event instance.
     */
    public function __construct(InterestsPlace $interestsPlace)
    {
        //
        $this->interestsPlace = $interestsPlace;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            'interests-places'
        ];
    }

    public function broadcastAs(): string
    {
        return 'interests-place-created';
    }
}
