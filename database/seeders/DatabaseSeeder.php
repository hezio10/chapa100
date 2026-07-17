<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProvinceSeeder::class,
            ServiceTypeSeeder::class,
            TransportTypeSeeder::class,
            LocationSeeder::class,
            BusLineSeeder::class,
        ]);

        DB::table('bus_line_transport_types')->insert([
            [
                'bus_line_id' => 1,
                'transport_type_id' => 1,
            ],
            [
                'bus_line_id' => 1,
                'transport_type_id' => 2,
            ],
            
        ]);
    }
}
