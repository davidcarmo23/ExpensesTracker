<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses as Expense;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $user_id = $request->user()->id;
        $expenses = Expense::with(['currency', 'category'])
            ->where('user_id', $user_id)
            ->orderBy('id')
            ->get();


        return view('expenses_list', ["expenses" => $expenses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //receive the request
        $request->validate([
            'amount' => 'required',
            'description' => 'required',
            'category' => 'required',
            'date' => 'required',
            'user_id' => 'required'
        ]);

        //create a new expense
        $expense = new Expense;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->category_id = $request->category_id;
        $expense->date = $request->date;
        $expense->user_id = $request->user_id;
        $expense->save();

        return redirect()->back()->with('success', 'Expense added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $expense = Expense::find($id);

        return $expense;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update the selected expense
        $request->validate([
            'amount' => 'required',
            'description' => 'required',
            'category' => 'required',
            'date' => 'required',
            'user_id' => 'required',
            'id' => 'required'
        ]);

        //create a new expense
        $expense = Expense::find($id);
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->category = $request->category;
        $expense->date = $request->date;
        $expense->user_id = $request->user_id;

        $expense->save();

        return redirect()->back()->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
        ]);

        $expense = Expense::find($id);
        if ($expense->user_id != $request->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this expense');
        }

        $expense->delete();

        return redirect()->back()->with('success', 'Expense deleted successfully');
    }
}
