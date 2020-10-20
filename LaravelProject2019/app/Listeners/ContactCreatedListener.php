<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\TaskCompleted;

class ContactCreatedListener
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
     * @param  ContactCreated  $event
     * @return void
     */
    public function handle($event)
    {
//        dd('from ContactCreatedListener', $event->contact);
        $admin = User::find(12);

        Notification::send($admin, new TaskCompleted($event->contact));
    }
}
