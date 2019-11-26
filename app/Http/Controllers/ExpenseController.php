<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recurring_expenses = Expense::getAllRecurringExpenses();

        $non_recurring_expenses = Expense::getNonRecurringExpenses();

        $daily_expenses_recurring = Expense::getRecurringExpensesByDay();

        $weekly_expenses_recurring = Expense::getRecurringExpensesByWeek();

        $monthly_expenses_recurring = Expense::getRecurringExpensesByMonth();

        $annual_expenses_recurring = Expense::getRecurringExpensesByYear();

        //Calculate total recurring annual expenses.
        //52.1429 is the number of weeks for more precise calculations
        $recurring_expenses_by_year = ($daily_expenses_recurring * 365)
            + ($weekly_expenses_recurring * 52.1429)
            + ($monthly_expenses_recurring * 12)
            + $annual_expenses_recurring;

        $recurring_expenses_by_day = round($recurring_expenses_by_year / 365, 2);
        $recurring_expenses_by_week = round($recurring_expenses_by_year / 52.1429, 2);
        $recurring_expenses_by_month = round($recurring_expenses_by_year / 12, 2);

        $each_recurring_expense_by_day = Expense::getEachRecurringExpenseByDay();

        $each_recurring_expense_by_week = Expense::getEachRecurringExpenseByWeek();
        $each_recurring_expense_by_month = Expense::getEachRecurringExpenseByMonth();
        $each_recurring_expense_by_year = Expense::getEachRecurringExpenseByYear();


        return view('expenses.index', [
            'non_recurring_expenses' => $non_recurring_expenses,
            'recurring_expenses' => $recurring_expenses,
            'recurring_expenses_by_day' => $recurring_expenses_by_day,
            'recurring_expenses_by_week' => $recurring_expenses_by_week,
            'recurring_expenses_by_month' => $recurring_expenses_by_month,
            'recurring_expenses_by_year' => $recurring_expenses_by_year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
        ]);

        expense::create($attributes);

        return redirect('/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', ['expense' => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', ['expense' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Expense $expense, Request $request)
    {
        $expense->update($request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
        ]));

        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect('/expenses');
    }

}
