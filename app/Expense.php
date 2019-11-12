<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    public static function getRecurringExpensesByDay()
    {
        return Expense::where('frequency', '=', '1')
            ->where('recurring', '=', '1')
            ->sum('amount');

    }

    public static function getNonRecurringExpensesByDay()
    {
        return Expense::where('frequency', '=', '1')
            ->sum('amount');

    }

    public static function getRecurringExpensesByWeek()
    {
        return Expense::where('frequency', '=', '7')
            ->where('recurring', '=', '1')
            ->sum('amount');

    }

    public static function getNonRecurringExpensesByWeek()
    {
        return Expense::where('frequency', '=', '7')
            ->sum('amount');

    }

    public static function getRecurringExpensesByMonth()
    {
        return Expense::where('frequency', '=', '30')
            ->where('recurring', '=', '1')
            ->sum('amount');
    }

    public static function getNonRecurringExpensesByMonth()
    {
        return Expense::where('frequency', '=', '30')
            ->sum('amount');
    }

    public static function getRecurringExpensesByYear()
    {
        return Expense::where('frequency', '=', '365')
            ->where('recurring', '=', '1')
            ->sum('amount');
    }

    public static function getNonRecurringExpensesByYear()
    {
        return Expense::where('frequency', '=', '30')
            ->sum('amount');
    }
}
