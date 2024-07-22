<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::insert([
            [
                "name"=> "Nike",
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                "name"=> "Adidas",
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                "name"=> "LV",
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
