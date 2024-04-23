<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;
use App\Models\Flight;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlineId = auth()->user()->airline_id;
        
        $flights = flight::where('airline_id', $airlineId)->get();
        return view('maskapai.show', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airlineName = auth()->user()->name;

        $airline = airline::where('name', $airlineName)->first();
        if ($airline) {
            $airlineId = $airline->id;
        } else {
            $airlineId = 'default_airline_id';
        }
        return view('maskapai.flight.add', ['airlineId' => $airlineId]);
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
