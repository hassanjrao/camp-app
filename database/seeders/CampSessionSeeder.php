<?php

namespace Database\Seeders;

use App\Models\CampSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[
            [
                "camp_id" => 1,
                "start_date" => '2023-04-15',
                "end_date" => '2023-04-19',
                "start_time" => '08:00:00',
                "end_time" => '10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 1,
                "start_date" => '2023-04-22',
                "end_date" => '2023-04-26',
                "start_time" => '12:00:00',
                "end_time" => '14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 1,
                "start_date" => '2023-04-29',
                "end_date" => '2023-05-03',
                "start_time" => '16:00:00',
                "end_time" => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-06',
                "end_date" => '2023-05-10',
                "start_time" => '08:00:00',
                "end_time" => '10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-13',
                "end_date" => '2023-05-17',
                "start_time" => '12:00:00',
                "end_time" => '14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-20',
                "end_date" => '2023-05-24',
                "start_time" => '16:00:00',
                "end_time" => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        CampSession::insert(
            $data
        );

    }
}
