<?php

namespace App\Console\Commands\Test;

use App\Models\Post;
use App\Models\User;
use App\Notifications\TestNotification;
use http\Env\Request;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Test;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Send Notification';

    /**
     * Execute the console command.
     */
    public function handle(Post $post)
    {
        //

//        $user = User::first();
//        $user->notify(new TestNotification());
//        $author = $post->user;
//        $author->notify(new TestNotification(Auth::user(), $post));
//        return redirect()->back()->with('success', '!!!!!!!!!');
    }
}
