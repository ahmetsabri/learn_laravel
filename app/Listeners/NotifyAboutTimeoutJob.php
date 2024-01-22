<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class NotifyAboutTimeoutJob
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
        Log::info('Job timed out');
    }
}
