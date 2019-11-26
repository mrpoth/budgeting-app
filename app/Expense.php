<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    //Functions for daily Expenses

    public static function getRecurringExpensesByDay()
    {
        return Expense::where('frequency', '=', '1')
            ->sum('amount');
    }

    public static function getEachRecurringExpenseByDay()
    {
        return Expense::where('frequency', '=', '1')->get();
    }

    //Functions for weekly Expenses

    public static function getRecurringExpensesByWeek()
    {
        return Expense::where('frequency', '=', '7')
            ->sum('amount');

    }

    public static function getEachRecurringExpenseByWeek()
    {
        return Expense::where('frequency', '=', '7')->get();
    }

    //Functions for monthly Expenses

    public static function getRecurringExpensesByMonth()
    {
        return Expense::where('frequency', '=', '30')
            ->sum('amount');
    }

    public static function getEachRecurringExpenseByMonth()
    {
        return Expense::where('frequency', '=', '30')->get();
    }

    //Functions for annual Expenses
    public static function getRecurringExpensesByYear()
    {
        return Expense::where('frequency', '=', '365')
            ->sum('amount');
    }

    public static function getEachRecurringExpenseByYear()
    {
        return Expense::where('frequency', '=', '365')->get();
    }

    //Misc non-recurring

    public static function getNonRecurringExpenses()
    {
        return Expense::where('frequency', '=', '0')->get();
    }

    //Misc recurring

    public static function getAllRecurringExpenses()
    {
        return Expense::where('frequency', '!=', '0')->get();
    }

}
