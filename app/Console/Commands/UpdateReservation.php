<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdateReservationsJob;
use App\ApiUser;

class UpdateReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateReservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch jobs to update reservations';

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
        $this->info('Starting dispatching reservation update jobs...');

        ApiUser::chunk(10, function ($usersChunk) {
            UpdateReservationsJob::dispatch($usersChunk)->onQueue('reservations');
        });

        $this->info('All reservation update jobs dispatched.');
    }
}
