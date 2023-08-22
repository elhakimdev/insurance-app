<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use App\Models\Image;
use App\Models\Insurance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Insurance/List');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::with(['series'])->get();
        $colors = Color::all();
        return Inertia::render('Insurance/Create', [
            "cars" => $cars,
            "colors" => $colors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = null;

        if($request->has('image') && $request->file('image') !== null){
            $originalName = $request->file('image')->getClientOriginalName();
            $extension  = $request->file('image')->getClientOriginalExtension(); 
            $filename   = time() . '.' . $originalName;
            $path       = 'storage/images';
            $size       = $request->file('image')->getSize();
            Storage::putFileAs($path, $request->image, $filename); 

            $image = Image::create([
                "image_original_name" => $originalName,
                "image_name" => $filename,
                "image_extension" => $extension,
                "image_path" => $path,
                "image_size" => $size,
            ]);
        }

        Insurance::updateOrCreate([
            'case' => $request->case ? $request->case : null,
        ], [
            'case' => $request->case ? $request->case : null,
            'millage' => $request->millage ? $request->millage : null,
            'buying_date' => $request->buying_date ? date('Y-m-d H:i:s',$request->buying_date/1000)  : null,
            'case' => $request->case ? $request->case : null,
            'car_id' => $request->car_id ? $request->car_id : null,
            'color_id' => $request->color_id ? $request->color_id : null,
            'series_id' => $request->series_id ? $request->series_id : null,
            'image_id' => $image ? $image->id : null,
            'drive_train' => $request->drive_train ? $request->drive_train : null
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
