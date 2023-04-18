<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [

                "name" => 'The Runners',
                'slug' => 'the-runners',
                'description' => 'This is the description for The Runners',
                'min_age' => 10,
                'max_age' => 13,
                'no_max_age' => 0,
                'max_registration' => 10,
                "created_at" => now(),
                "updated_at" => now(),

            ], [

                "name" => 'The Rebels',
                'slug' => 'the-rebels',
                'description' => 'This is the description for The Rebels',
                'min_age' => 14,
                'max_age' => NULL,
                'no_max_age' => 1,
                'max_registration' => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];
        Camp::insert($data);
    }
}
