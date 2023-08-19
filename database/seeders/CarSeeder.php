<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carModels = [
            "BMW", "Mercedes", "Jeep"
        ];

        collect($carModels)->each(function($model){
            Car::create([
                "name" => $model
            ]);
        });
    }
}
