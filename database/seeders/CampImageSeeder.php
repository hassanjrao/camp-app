<?php

namespace Database\Seeders;

use App\Models\CampImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampImageSeeder extends Seeder
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
                "image" => 'https://picsum.photos/seed/1/200/300',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'camp_id' => 1,
                'image' => 'https://picsum.photos/seed/2/200/300',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'camp_id' => 2,
                'image' => 'https://picsum.photos/seed/4/200/300',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'camp_id' => 2,
                'image' => 'https://picsum.photos/seed/5/200/300',
                'created_at' => now(),
                'updated_at' => now(),

            ],

        ];
        CampImage::insert(
            $data
        );
    }
}
