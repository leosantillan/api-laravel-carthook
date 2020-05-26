<?php

namespace App\Providers;

use App\Providers\EmptyDataRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CacheDataInDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmptyDataRequested  $event
     * @return void
     */
    public function handle(EmptyDataRequested $event)
    {
        //
    }
}
