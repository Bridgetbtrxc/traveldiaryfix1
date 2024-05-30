<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    public function addExpense(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|integer',
            'expense_date' => 'required|date',
            // Add any other validation rules as needed
        ]);

        // Create a new expense with itinerary_id and user_id
        $expense = new Expense();
        $expense->title = $validatedData['title'];
        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->expense_date = $validatedData['expense_date'];
        $expense->itinerary_id = $request->itinerary_id;
        $expense->user_id = auth()->id();
        $expense->save();

        // Redirect back or wherever you want after creating the expense
        return redirect()->back()->with('success', 'Expense added successfully!');
    }

    public function getExpensesByItinerary($itineraryId)
    {
        // Retrieve all expenses for the specified itinerary ID
        $expenses = Expense::where('itinerary_id', $itineraryId)->get();

        // Pass the expenses to the view
        return view('ItineraryView', ['expenses' => $expenses]);
    }

    public function deleteExpense(Expense $expense)
    {
        $expense->delete();

        // Redirect back or wherever you want after deleting the expense
        return redirect()->back()->with('success', 'Expense deleted successfully!');
    }

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

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
