<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $actionRoute = 'clients.store';
        $title = "Add new client";
        $formFields = [
            ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text'],
            ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text'],
            ['name' => 'email_address', 'label' => 'Email', 'type' => 'email'],
            ['name' => 'phone_number', 'label' => 'Phone Number', 'type' => 'tel'],
            ['name' => 'address', 'label' => 'Address', 'type' => 'text'],
        ];
        return view('clients.create', compact(['actionRoute', 'formFields', 'title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email_address' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'address' => 'required',
        ]);

        Client::create($data);

        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
