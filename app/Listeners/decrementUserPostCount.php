<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PostDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class decrementUserPostCount
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
    public function handle(PostDeleted $event): void
    {
        User::where('id', $event->post->user_id)
            ->decrement('posts_count');
    }
}
