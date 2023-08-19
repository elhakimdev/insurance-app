<?php

namespace Database\Seeders;

use App\Models\Color;
use GuzzleHttp\Promise\Each;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $initialColor = ["white", "silver", "black","other"];
        collect($initialColor)->each(function($color){
            Color::create([
                "name" => $color
            ]);
        });
    }
}
