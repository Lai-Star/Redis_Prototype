<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    public function fetchNewReservations()
    {
        // Simulate fetching a number of reservation data for each facility
        $reservations = collect();

        // Assuming each facility can have up to 20 new reservations
        $newReservationsCount = rand(10, 20);

        for ($i = 1; $i <= $newReservationsCount; $i++) {
            $reservations->push([
                'id' => $i,
                'details' => 'Reservation detail ' . $i,
                // Add more fields relevant to your reservation data
            ]);
        }

        return $reservations;
    }
}
