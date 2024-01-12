<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('reservations')->insert([
                'customer_name' => $faker->name,
                'reservation_details' => $faker->text,
                // other fields...
            ]);
        }

    }
}
