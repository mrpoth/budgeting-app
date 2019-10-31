<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = DB::table('expenses')->paginate(15);

        $weekly_expenses = DB::table('expenses')->where('frequency' , '=', 7)->sum('amount');
        $weekly_as_daily = round($weekly_expenses / 7 , 2);

        $monthly_expenses = DB::table('expenses')->where('frequency' , '=', 30)->sum('amount');
        $monthly_as_daily = round($monthly_expenses / 30 , 2);

        $annual_expense = DB::table('expenses')->where('frequency', '=', 365)->sum('amount');
        $annual_expenses = ($weekly_expenses * 52) + ($monthly_expenses *12) + $annual_expense;
        $annual_as_daily = round($annual_expenses / 365 , 2);

        $expenses_by_week = $annual_expenses / 52;
        $expenses_by_month = $annual_expenses / 12;


        return view('expenses.index', [
            'expenses' => $expenses,
            'expenses_by_week' => $expenses_by_week,
            'weekly_expenses' => $weekly_expenses,
            'expenses_by_month' => $expenses_by_month,
            'monthly_expenses' => $monthly_expenses,
            'annual_expenses' => $annual_expenses,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $attributes = request([
        //     'expense_title',
        //     'expense_amount',
        //     'expense_frequency',
        //     'expense_recurring',
        // ]);

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => 'required',
            'recurring' => ['required', 'boolean']
        ]);

        Expense::create($attributes);

        return redirect('/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense)
    {
        $expense->update(request([
            'title',
            'amount',
            'frequency',
            'recurring'
        ]));

        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect('/expenses');
    }

}
