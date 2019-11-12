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
        $expenses = Expense::paginate(15);

        $daily_expenses_recurring = Expense::getRecurringExpensesByDay();
        $daily_expenses_non_recurring = Expense::getNonRecurringExpensesByDay();

        $weekly_expenses_recurring = Expense::getRecurringExpensesByWeek();
        $weekly_expenses_non_recurring = Expense::getNonRecurringExpensesByWeek();

        //Calculate weekly-only expenses as expressed in a single day. E.g. paying 70 a week means you pay 10/day.
        $weekly_as_daily = round($weekly_expenses_recurring / 7, 2);

        $monthly_expenses_recurring = Expense::getRecurringExpensesByMonth();
        $monthly_expenses_non_recurring = Expense::getNonRecurringExpensesByMonth();

        //Calculate monthly-only recurring expenses as expressed in a single day. E.g. paying 30 a month month means you pay 1/day.
        //Not too accurate because it treats every month as having 30 days.
        $recurring_monthly_as_daily = round($monthly_expenses_recurring / 30, 2);

        $annual_expenses_recurring = Expense::getRecurringExpensesByYear();
        $annual_expenses_non_recurring = Expense::getNonRecurringExpensesByYear();

        //Calculate total recurring annual expenses.
        $recurring_expenses_by_year = ($daily_expenses_recurring * 365)
            + ($weekly_expenses_recurring * 52)
            + ($monthly_expenses_recurring * 12)
            + $annual_expenses_recurring;
        //Calculate annual-only recurring expenses as expressed in a single day. E.g. paying 365 a year means you pay 1/day.
        $annual_as_daily = round($recurring_expenses_by_year / 365, 2);

        $recurring_expenses_by_week = round($recurring_expenses_by_year / 52, 2);
        $recurring_expenses_by_month = round($recurring_expenses_by_year / 12, 2);


        return view('expenses.index', [
            'expenses' => $expenses,
            'recurring_expenses_by_week' => $recurring_expenses_by_week,
            'recurring_expenses_by_month' => $recurring_expenses_by_month,
            'recurring_expenses_by_year' => $recurring_expenses_by_year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
            'recurring' => ['required', 'boolean'],
        ]);

        Expense::create($attributes);

        return redirect('/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', ['expense' => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', ['expense' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense, Request $request)
    {
        $expense->update($request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
            'recurring' => ['required', 'boolean']
        ]));

        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect('/expenses');
    }

}
