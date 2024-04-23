<?php

namespace App\Http\Controllers;

use App\Models\airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = airline::all();
        return view('admin.airline.show', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.airline.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $airline = new airline;
        $airline->name = $request->input('name');

        $airline->save();

        return redirect()->route('admin.airlines');
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
    public function edit(Request $request, $id)
    {
        $airlines = airline::find($id);
        return view('admin.airline.edit',compact('airlines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $airline = airline::find($id);  
        $airline->name = $request->input('name');

        $airline->save();

        return redirect()->route('admin.airlines');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $airlines = airline::find($id);
        $airlines->delete();

        return redirect()->route('admin.airlines')->with('success', 'deleted successfully');
    }
}
