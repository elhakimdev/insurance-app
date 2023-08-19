<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Series;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bmwSeries          = ["3 Series", "5 Series", "7 series"];
        $mercedesSeries     = ["C Class", "E Class", "S Class"];
        $jeepSeries         = ["Wrangler", "Grand Cherokee"];
        
        collect($bmwSeries)->each(function($bwmSeri){
            Series::factory()->for(Car::where([
                "name" => "BMW"
            ])->first())->create([
                "name" => $bwmSeri,
            ]);
        });
        collect($mercedesSeries)->each(function($mercedesSeri){
            Series::factory()->for(Car::where([
                "name" => "Mercedes"
            ])->first())->create([
                "name" => $mercedesSeri,
            ]);
        });
        collect($jeepSeries)->each(function($jeepSeri){
            Series::factory()->for(Car::where([
                "name" => "Jeep"
            ])->first())->create([
                "name" => $jeepSeri,
            ]);
        });
    }
}
