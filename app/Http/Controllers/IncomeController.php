<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Illuminate\Http\Response;

class IncomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recurring_incomes = Income::getAllRecurringIncomes();

        $non_recurring_incomes = Income::getNonRecurringIncomes();

        $daily_incomes_recurring = Income::getRecurringIncomesByDay();

        $weekly_incomes_recurring = Income::getRecurringIncomesByWeek();

        $monthly_incomes_recurring = Income::getRecurringIncomesByMonth();

        $annual_incomes_recurring = Income::getRecurringIncomesByYear();

        //Calculate total recurring annual incomes.
        //52.1429 is the number of weeks for more precise calculations
        $recurring_incomes_by_year = ($daily_incomes_recurring * 365)
            + ($weekly_incomes_recurring * 52.1429)
            + ($monthly_incomes_recurring * 12)
            + $annual_incomes_recurring;

        $recurring_incomes_by_day = round($recurring_incomes_by_year / 365, 2);
        $recurring_incomes_by_week = round($recurring_incomes_by_year / 52.1429, 2);
        $recurring_incomes_by_month = round($recurring_incomes_by_year / 12, 2);

        $each_recurring_income_by_day = Income::getEachRecurringIncomeByDay();

        $each_recurring_income_by_week = Income::getEachRecurringIncomeByWeek();
        $each_recurring_income_by_month = Income::getEachRecurringIncomeByMonth();
        $each_recurring_income_by_year = Income::getEachRecurringIncomeByYear();


        return view('incomes.index', [
            'non_recurring_incomes' => $non_recurring_incomes,
            'recurring_incomes' => $recurring_incomes,
            'recurring_incomes_by_day' => $recurring_incomes_by_day,
            'recurring_incomes_by_week' => $recurring_incomes_by_week,
            'recurring_incomes_by_month' => $recurring_incomes_by_month,
            'recurring_incomes_by_year' => $recurring_incomes_by_year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('incomes.create');
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

        income::create($attributes);

        return redirect('/incomes');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Income $income)
    {
        return view('incomes.show', ['income' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Income $income)
    {
        return view('incomes.edit', ['income' => $income]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Income $income, Request $request)
    {
        $income->update($request->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required', 'numeric'],
            'frequency' => ['required', 'numeric'],
        ]));

        return redirect('/incomes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        return redirect('/incomes');
    }

}
