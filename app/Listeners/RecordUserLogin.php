<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordUserLogin implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {
        //
        UserLogin::create([
            'user_id' => $event->user->user_id
        ]);
    }
}
