<?php

namespace Database\Seeders;

use App\Models\InterestsPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestsPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $interestsPlaces = [
            [
                "name" => "Small Gate",
                "latitude" => "-25.540645639872434",
                "longitude" => "28.09761459079238"
            ],

            [
                "name" => "Ruth First Hall",
                "latitude" => "-25.541652925037262",
                "longitude" => "28.095749796945846"
            ]
        ];

        foreach ($interestsPlaces as $interestsPlace) {
            InterestsPlace::create($interestsPlace);
        }
    }
}
