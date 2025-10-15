<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('ships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
        $data = $request->validate([
            'name' => 'required|min:5|string',
            'registration_number' => 'required|min:3|string|max:200',
            'capacity_in_tonnes' => 'required|decimal:2',
            'type' => 'required|string',
            'status' => 'nullable|string',
        ]);

        Ship::create($data);

        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ship $ship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ship $ship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ship $ship)
    {
        //
    }
}

