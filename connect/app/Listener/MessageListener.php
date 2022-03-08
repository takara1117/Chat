<?php

namespace App\Listener;

use App\Events\MessageSentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageListener
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
     * @param  \App\Events\MessageSentEvent  $event
     * @return void
     */
    public function handle(MessageSentEvent $event)
    {
        //
    }
}
