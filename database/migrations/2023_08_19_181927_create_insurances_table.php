<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\Image;
use App\Models\Series;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->char('case')->nullable()->default(null);
            $table->integer('millage')->nullable()->default(null);
            $table->datetime('buying_date')->nullable()->default(null);
            $table->char('drive_train')->nullable()->default(null);
            $table->foreignIdFor(Car::class)->nullable()->default(null);
            $table->foreignIdFor(Series::class)->nullable()->default(null);
            $table->foreignIdFor(Color::class)->nullable()->default(null);
            $table->foreignIdFor(Image::class)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
