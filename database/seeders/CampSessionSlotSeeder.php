<?php

namespace Database\Seeders;

use App\Models\CampSessionSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSessionSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CampSessionSlot::insert([
            [
                "camp_session_id" => 1,
                "start_time" => "08:00:00",
                "end_time" => "12:00:00",
            ],
            [
                "camp_session_id" => 1,
                "start_time" => "13:00:00",
                "end_time" => "17:00:00",
            ],
            [
                "camp_session_id" => 2,
                "start_time" => "08:00:00",
                "end_time" => "12:00:00",
            ],
            [
                "camp_session_id" => 2,
                "start_time" => "13:00:00",
                "end_time" => "17:00:00",
            ]
            ]);

    }
}
