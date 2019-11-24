<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::paginate(15);

        $daily_incomes_recurring = income::getRecurringIncomesByDay();
        $daily_incomes_non_recurring = income::getNonRecurringIncomesByDay();

        $weekly_incomes_recurring = income::getRecurringIncomesByWeek();
        $weekly_incomes_non_recurring = income::getNonRecurringIncomesByWeek();

        //Calculate weekly-only incomes as expressed in a single day. E.g. paying 70 a week means you pay 10/day.
        $weekly_as_daily = round($weekly_incomes_recurring / 7, 2);

        $monthly_incomes_recurring = income::getRecurringIncomesByMonth();
        $monthly_incomes_non_recurring = income::getNonRecurringIncomesByMonth();

        //Calculate monthly-only recurring incomes as expressed in a single day. E.g. paying 30 a month month means you pay 1/day.
        //Not too accurate because it treats every month as having 30 days.
        $recurring_monthly_as_daily = round($monthly_incomes_recurring / 30, 2);

        $annual_incomes_recurring = income::getRecurringIncomesByYear();
        $annual_incomes_non_recurring = income::getNonRecurringIncomesByYear();

        //Calculate total recurring annual incomes.
        $recurring_incomes_by_year = ($daily_incomes_recurring * 365)
            + ($weekly_incomes_recurring * 52)
            + ($monthly_incomes_recurring * 12)
            + $annual_incomes_recurring;
        //Calculate annual-only recurring incomes as expressed in a single day. E.g. paying 365 a year means you pay 1/day.
        $annual_as_daily = round($recurring_incomes_by_year / 365, 2);

        $recurring_incomes_by_week = round($recurring_incomes_by_year / 52, 2);
        $recurring_incomes_by_month = round($recurring_incomes_by_year / 12, 2);


        return view('incomes.index', [
            'incomes' => $incomes,
            'recurring_incomes_by_week' => $recurring_incomes_by_week,
            'recurring_incomes_by_month' => $recurring_incomes_by_month,
            'recurring_incomes_by_year' => $recurring_incomes_by_year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes.create');
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

        income::create($attributes);

        return redirect('/incomes');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('incomes.show', ['income' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('incomes.edit', ['income' => $income]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Income $income, Request $request)
    {
        $income->update($request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
            'recurring' => ['required', 'boolean']
        ]));

        return redirect('/incomes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        return redirect('/incomes');
    }

}
