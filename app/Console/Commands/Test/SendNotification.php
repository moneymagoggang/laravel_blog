<?php

namespace App\Console\Commands\Test;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Console\Command;
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
    public function handle()
    {
        //
        $user = User::first();
        $user->notify(new TestNotification());

    }
}
