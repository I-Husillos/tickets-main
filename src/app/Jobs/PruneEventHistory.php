<?php

namespace App\Jobs;

use App\Models\EventHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Symfony\Contracts\EventDispatcher\Event;

class PruneEventHistory implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        EventHistory::where('created_at', '<', now()->subMonths(6))->delete();

        self::dispatch()->delay(now()->addDays(30));
    }
}
