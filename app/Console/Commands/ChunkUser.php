<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Log;

class ChunkUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chunk-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('status', 0)->chunkById(1000, function ($users) {
            foreach ($users as $user) {
                $user->update(['status' => 1]);
                Log::info('user updated : '.$user->id);
            }

        });

        $this->info('Done');
    }
}
