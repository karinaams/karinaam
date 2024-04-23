<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flight;


class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'airline_id' => 'required',
            'no_flight' => 'required',
            'departure_city' => 'required',
            'departure_time' => 'required',
            'departure_date' => 'required',
            'arrival_city' => 'required',
            'arrival_time' => 'required',
            'arrival_date' => 'required',
            'seat_availability' => 'required|integer',
            'price' => 'required|integer', 
        ]);

        Flight::create($request->all());

        return redirect()->route('maskapai.dashboard');
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
        $flight = Flight::find($id);
        return view('maskapai.flight.edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'airline_id' => 'required',
            'no_flight' => 'required',
            'departure_city' => 'required',
            'departure_time' => 'required',
            'departure_date' => 'required',
            'arrival_city' => 'required',
            'arrival_time' => 'required',
            'arrival_date' => 'required',
            'seat_availability' => 'required|integer',
            'price' => 'required|integer',
        ]);

        // Ambil data penerbangan berdasarkan ID
        $flight = Flight::find($id);

        // Periksa apakah data penerbangan ditemukan
        if (!$flight) {
            return redirect()->route('maskapai.dashboard')->with('error', 'Data penerbangan tidak ditemukan.');
        }

        // Update data penerbangan
        $flight->update($request->all());
        return redirect()->route('maskapai.dashboard')->with('success', 'Data penerbangan berhasil diperbarui.');
    }
    
    public function destroy(Request $request, string $id)
    {
        $flight = Flight::find($id);
        $flight->delete();

        return redirect()->route('maskapai.dashboard');
    }
}
