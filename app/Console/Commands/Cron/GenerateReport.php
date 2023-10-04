<?php

namespace App\Console\Commands\Cron;

use Illuminate\Console\Command;

class GenerateReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:generate-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly generate report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        dump('here');
    }
}
