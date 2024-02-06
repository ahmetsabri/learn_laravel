<?php

namespace App\Listeners;

use Log;

class JobQueuedListener
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
    public function handle(object $event): void
    {
        Log::info('Job queueed', [
            'job' => $event,
        ]);
    }
}
