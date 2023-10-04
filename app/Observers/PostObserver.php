<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Post;
use App\Notifications\AdminReviewNotification;
use App\Notifications\SuccessCreateNotification;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
        $user = auth()->user();

        $user->notify(new SuccessCreateNotification());

    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {

    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
