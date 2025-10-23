<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ports.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $actionRoute = "ports.store";
        $title = "Add new port";
        $formFields = [
            ['name' => 'name', 'label' => 'Port name', 'type' => 'text'],
            ['name' => 'country', 'label' => 'Country', 'type' => 'text'],
            ['name' => 'coordinates', 'label' => 'Coordinates', 'type' => 'number', 'step' => '0.001'],
            ['name' => 'depth', 'label' => 'Depth (in metres)', 'type' => 'number', 'step' => '0.1'],
            ['name' => 'port_type', 'label' => 'Port type', 'type' => 'text'],
            ['name' => 'docking_capacity', 'label' => 'Docking capacity', 'type' => 'number', 'step' => '0'],
            ['name' => 'security_level', 'label' => 'Security level', 'type' => 'number', 'step' => '0'],
            ['name' => 'customs_authorized', 'label' => 'Customs authorized', 'type' => 'number', 'step' => '0'],
            ['name' => 'operational_hours', 'label' => 'Operational hours', 'type' => 'number', 'step' => '0'],
            ['name' => 'max_vessel_size', 'label' => 'Maximum vessel size (length in metres)', 'type' => 'number', 'step' => '0'],
            ['name' => 'port_manager', 'label' => 'Port manager', 'type' => 'text'],
            ['name' => 'port_contact_info', 'label' => 'Port contact info', 'type' => 'text'],
        ];

        return view('ports.create', compact(['formFields', 'actionRoute', 'title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'port_type' => 'nullable|string|max:100',
            'coordinates' => 'required|decimal:2',
            'depth' => 'nullable|string',
            'docking_capacity' => 'nullable|string',
            'max_vessel_size' => 'required|string',
            'security_level' => 'required|string|max:50',
            'customs_authorized' => 'required|boolean',
            'operational_hours' => 'nullable|string|max:50',
            'port_manager' => 'required|string|max:255',
            'port_contact_info' => 'required|string',
        ]);

        Port::create($data);
        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Port $port)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Port $port)
    {
        //
        $actionRoute = "ports.update";
        $title = "Edit port";
        $formFields = [
            ['name' => 'name', 'label' => 'Port name', 'type' => 'text'],
            ['name' => 'country', 'label' => 'Country', 'type' => 'text'],
            ['name' => 'coordinates', 'label' => 'Coordinates', 'type' => 'number', 'step' => '0.001'],
            ['name' => 'depth', 'label' => 'Depth (in metres)', 'type' => 'number', 'step' => '0.1'],
            ['name' => 'port_type', 'label' => 'Port type', 'type' => 'text'],
            ['name' => 'docking_capacity', 'label' => 'Docking capacity', 'type' => 'number', 'step' => '0'],
            ['name' => 'security_level', 'label' => 'Security level', 'type' => 'number', 'step' => '0'],
            ['name' => 'customs_authorized', 'label' => 'Customs authorized', 'type' => 'number', 'step' => '0'],
            ['name' => 'operational_hours', 'label' => 'Operational hours', 'type' => 'number', 'step' => '0'],
            ['name' => 'max_vessel_size', 'label' => 'Maximum vessel size (length in metres)', 'type' => 'number', 'step' => '0'],
            ['name' => 'port_manager', 'label' => 'Port manager', 'type' => 'text'],
            ['name' => 'port_contact_info', 'label' => 'Port contact info', 'type' => 'text'],
        ];
        $data = $port;
        return view('ports.edit', compact('formFields', 'actionRoute', 'title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Port $port)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Port $port)
    {
        //
    }
}
