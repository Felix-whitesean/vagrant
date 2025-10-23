<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Port;
use App\Models\Ship;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
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
        $actionRoute = "shipments.store";
        $title = "Add new shipment";
        $formFields = [
            ['name' => 'cargo_id', 'label' => 'Cargo', 'type' => 'select', 'optionsArray' => 'cargo'],
            ['name' => 'ship_id', 'label' => 'Ship', 'type' => 'select', 'optionsArray' => 'ships'],
            ['name' => 'origin_port_id', 'label' => 'Origin port', 'type' => 'select', 'optionsArray' => 'ports'],
            ['name' => 'destination_port_id', 'label' => 'Destination port', 'type' => 'select', 'optionsArray' => 'ports'],
            ['name' => 'departure_date', 'label' => 'Date of departure', 'type' => 'date'],
            ['name' => 'arrival_estimate', 'label' => 'Estimated arrival date', 'type' => 'date'],
            ['name' => 'actual_arrival_date', 'label' => 'Actual arrival date', 'type' => 'date'],
            ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'optionsArray' => 'shipmentStatus'],
        ];
        $shipmentStatus = ['pending', 'in_transit', 'delivered', 'delayed'];
        $cargo = Cargo::pluck('client_id', 'id')->toArray();
        $ships = Ship::pluck('name', 'id')->toArray();
        $ports = Port::pluck('name', 'id')->toArray();

        return view('shipments.create', compact(['actionRoute', 'formFields', 'shipmentStatus', 'cargo', 'ships', 'ports', 'title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'cargo_id' => 'required|string',
            'ship_id' => 'required|string',
            'origin_port_id' => 'required|string',
            'destination_port_id' => 'required|string',
            'departure_date' => 'required|date',
            'arrival_estimate' => 'required|date|after:departure_date',
            'actual_arrival_date' => 'required|date|after:departure_date',
            'status' => 'required|string',
        ]);

        Shipment::create($data);

        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
