<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\categories;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i < 8; $i++) {
        //     categories::create([
        //         "name"=> $faker->word,
        //     ]);
        // }

        Categories::insert([
            [
                "name"=> "Giày nam",
            ],
            [
                "name"=> "Giày nữ",
            ],
            [
                "name"=> "Giày đôi",
            ],
        ]);
    }
}
