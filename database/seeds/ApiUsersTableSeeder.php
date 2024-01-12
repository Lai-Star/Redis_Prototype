<?php

use Illuminate\Database\Seeder;
use App\ApiUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_users')->truncate();

        for ($i = 0; $i < 1000; $i++) { // Adjust the number for your needs
            ApiUser::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                // other fields...
            ]);
        }
    }
}
