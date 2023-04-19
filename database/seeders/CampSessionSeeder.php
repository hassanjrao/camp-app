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

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 1,
                "start_date" => '2023-04-22',
                "end_date" => '2023-04-26',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 1,
                "start_date" => '2023-04-29',
                "end_date" => '2023-05-03',
                
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-06',
                "end_date" => '2023-05-10',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-13',
                "end_date" => '2023-05-17',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "camp_id" => 2,
                "start_date" => '2023-05-20',
                "end_date" => '2023-05-24',
                
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        CampSession::insert(
            $data
        );

    }
}
