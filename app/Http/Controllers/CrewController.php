<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Ship;
use Illuminate\Http\Request;

class CrewController extends Controller
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
        $actionRoute = "crew.store";
        $title = "Add new crew member";
        $formFields = [
            ['name' => 'ship_id', 'label' => 'Ship', 'type' => 'select', 'optionsArray' => 'ships'],
            ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text'],
            ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text'],
            ['name' => 'role', 'label' => 'Role', 'type' => 'select', 'optionsArray' => 'crewRoles'],
            ['name' => 'phone_number', 'label' => 'Phone Number', 'type' => 'tel'],
            ['name' => 'nationality', 'label' => 'Nationality', 'type' => 'text'],
        ];

        $ships = Ship::pluck('name', 'id')->toArray();
        $crewRoles = ['Captain', 'Chief Officer', 'Able Seaman', 'Ordinary Seaman', 'Engine Cadet', 'Radio Officer', 'Chief Cook', 'Steward', 'Deckhand'];

        return view('crew.create', compact('actionRoute', 'formFields', 'ships', 'crewRoles', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'ship_id' => 'nullable|numeric',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' => 'required|string',
            'phone_number' => 'required|string',
            'nationality' => 'required|string',
        ]);

        Crew::create($data);

        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crew $crew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crew $crew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crew $crew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crew $crew)
    {
        //
    }
}
