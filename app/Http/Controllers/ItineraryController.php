<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use Illuminate\Validation\ValidationException;

class ItineraryController extends Controller
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
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
        } catch (ValidationException $e) {
            // If validation fails, redirect back with error messages
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // Create a new itinerary
        $itinerary = new Itinerary();
        $itinerary->user_id = auth()->id(); // Assuming user is authenticated
        $itinerary->title = $validatedData['title'];
        $itinerary->description = $validatedData['description'];
        $itinerary->start_date = $validatedData['start_date'];
        $itinerary->end_date = $validatedData['end_date'];
        $itinerary->save();

        // Redirect back or wherever you want after creating the itinerary
        return redirect()->back()->with('success', 'Itinerary created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Itinerary $itinerary)
    {
        return view('ItineraryView', compact('itinerary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinerary $itinerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItineraryRequest $request, Itinerary $itinerary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinerary $itinerary)
    {
        $userId = $itinerary->user_id; // Get the user ID before deletion
        $itinerary->delete();

        // Redirect to the loginsuccessful route with the user ID
        return redirect()->route('loginsuccessful', ['id' => $userId])->with('success', 'Itinerary deleted successfully!');
    }
}