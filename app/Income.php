<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];

    //Functions for daily incomes

    public static function getRecurringIncomesByDay()
    {
        return Income::where('frequency', '=', '1')
            ->sum('amount');
    }

    public static function getEachRecurringIncomeByDay()
    {
        return Income::where('frequency', '=', '1')->get();
    }

    //Functions for weekly incomes

    public static function getRecurringIncomesByWeek()
    {
        return Income::where('frequency', '=', '7')
            ->sum('amount');

    }

    public static function getEachRecurringIncomeByWeek()
    {
        return Income::where('frequency', '=', '7')->get();
    }

    //Functions for monthly incomes

    public static function getRecurringIncomesByMonth()
    {
        return Income::where('frequency', '=', '30')
            ->sum('amount');
    }

    public static function getEachRecurringIncomeByMonth()
    {
        return Income::where('frequency', '=', '30')->get();
    }

    //Functions for annual incomes
    public static function getRecurringIncomesByYear()
    {
        return Income::where('frequency', '=', '365')
            ->sum('amount');
    }

    public static function getEachRecurringIncomeByYear()
    {
        return Income::where('frequency', '=', '365')->get();
    }

    //Misc non-recurring

    public static function getNonRecurringIncomes()
    {
        return Income::where('frequency', '=', '0')->get();
    }

    //Misc recurring

    public static function getAllRecurringIncomes()
    {
        return Income::where('frequency', '!=', '0')->get();
    }

}
