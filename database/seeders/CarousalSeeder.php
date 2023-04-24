<?php

namespace Database\Seeders;

use App\Models\Carousal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarousalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousal::all()->each->delete();

        Carousal::create([
            "id"=>1,
            "title"=>"The best camp ever",
            "subtitle"=>"The best camp ever",
            "description"=>"The best camp ever",
            "image"=>"carousal/1.jpg",
        ]);
    }
}
