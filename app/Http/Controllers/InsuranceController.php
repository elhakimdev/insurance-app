<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use Illuminate\Http\Request;
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
        //
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
