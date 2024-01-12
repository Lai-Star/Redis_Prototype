<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\ApiUser;
use Log;
use Exception;

class UpdateReservationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $apiUsersChunk;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($apiUsersChunk)
    {
        $this->apiUsersChunk = $apiUsersChunk;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("Processing a chunk of " . count($this->apiUsersChunk) . " users.");

        foreach ($this->apiUsersChunk as $apiUser) {
            try {
                $this->updateForUser($apiUser);
            } catch (Exception $e) {
                Log::error("Error updating reservations for user {$apiUser->id}: {$e->getMessage()}");
                // Consider rethrowing if retries are needed
            }
        }

        Log::info("Finished processing chunk of users.");
    }

    protected function updateForUser(ApiUser $apiUser)
    {
        Log::info("Fetching new reservations for user {$apiUser->id}");

        $newReservations = $apiUser->fetchNewReservations();

        foreach ($newReservations as $reservation) {
            Log::info("Processing reservation {$reservation['id']} for user {$apiUser->id}");
            // Implement actual update logic here
            // Example: Reservation::updateOrCreate(['id' => $reservation['id']], $reservation);

            // Simulating a delay to mimic processing time (remove in production)
            sleep(1);
        }

        Log::info("Completed updating reservations for user {$apiUser->id}");
    }
}
