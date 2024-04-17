<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $administrators = array(
            [
                "name" => "Karabo",
                "surname" => "Dotwana",
                "email" => "karabo.dotwana@campusorient.co.za",
                "password" => "password",
                "type" => "admin"
            ], [
                "name" => "Yolanda",
                "surname" => "Mbande",
                "email" => "yolanda.mbande@campusorient.co.za",
                "password" => "password",
                "type" => "admin"
            ]
        );

        foreach ($administrators as $key => $administrator) {
            User::create($administrator);
        }
    }
}
