<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:run';

    /**
     * The console command description.
     *
     * @var string
     */
     protected $description = 'Run the project with scheduler, queue worker, and custom command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Starting the project...');

        $process = new Process(['php', 'artisan', 'serve']);
        $process->start();

        // Run Scheduler
        $scheduler = new Process(['php', 'artisan', 'schedule:run']);
        $scheduler->start();

        // Run Queue Worker
        $queue = new Process(['php', 'artisan', 'queue:work']);
        $queue->start();

        // // Run Custom Command
        // $customCommand = new Process(['php', 'artisan', 'command:reservation']);
        // $customCommand->run();

        // Keep the command running
        while ($scheduler->isRunning() || $queue->isRunning()) {
            // You can add some sleep here if needed
        }

        $this->info('Project processes have been started.');
    }
}
