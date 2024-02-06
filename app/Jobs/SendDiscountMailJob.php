<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendDiscountMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        $this->tries = 3;
    }

    public function backoff(): int
    {
        return 1;
    }

    public function onQueue($queue)
    {
        return 'redis';
    }

    public function handle(): void
    {

        // sleep(3);
        $user = User::find(100000)->name;
        logger()->info('Email sent successfully');

    }

    public function failed(): void
    {
        logger()->error('there is an error');
    }
}
