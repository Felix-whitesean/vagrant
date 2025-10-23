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
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actionRoute = "ships.store";
        $title = "Add new ship";
        $formFields = [
            ['name' => 'name', 'label' => 'Ship name', 'type' => 'text'],
            ['name' => 'registration_number', 'label' => 'Registration number', 'type' => 'text'],
            ['name' => 'capacity_in_tonnes', 'label' => 'Capacity (in tonnes)', 'type' => 'number', 'step' => '0.01'],
            ['name' => 'type', 'label' => 'Type', 'type' => 'select', 'optionsArray' => 'ship_types'],
            ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'optionsArray' => 'status'],
        ];
        $ship_types = ['cargo ship', 'passenger ship', 'military ship', 'icebreaker', 'fishing vessel', 'barge ship'];
        $status = [ 'active', 'under maintenance', 'decommissioned'];

        return view('ships.create', compact(['formFields', 'actionRoute', 'ship_types', 'status', 'title']));
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

