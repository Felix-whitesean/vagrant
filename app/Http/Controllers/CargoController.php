<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
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
        $actionRoute = "cargo.store";
        $title = "Add new cargo";
        $formFields = [
            ['name' => 'description', 'label' => 'Cargo description', 'type' => 'text'],
            ['name' => 'weight', 'label' => 'Weight', 'type' => 'number', 'step' => '0.01'],
            ['name' => 'volume', 'label' => 'Volume', 'type' => 'number', 'step' => '0.01'],
            ['name' => 'cargo_type', 'label' => 'Cargo type', 'type' => 'select', 'optionsArray' => 'cargoTypes'],
            ['name' => 'client_id', 'label' => 'Client', 'type' => 'select', 'optionsArray' => 'items'],
        ];

        $cargoTypes = ['perishable', 'dangerous', 'general', 'other'];
        $items = Client::select('id', DB::raw("CONCAT(first_name, ' ', last_name) as label"))
            ->pluck('label', 'id')
            ->toArray();

        return  view('cargo.create', compact(['formFields', 'actionRoute','cargoTypes', 'items', 'title']));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'description' => 'nullable|string',
            'weight' => 'required|numeric|decimal:2',
            'volume' => 'required|numeric|decimal:2',
            'cargo_type' => 'required|in:perishable,dangerous,general',
            'client_id' => 'nullable|numeric|exists:clients,id',
        ]);

        Cargo::create($data);

        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargo $cargo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        //
    }
}
