<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];

    public static function getRecurringIncomesByDay()
    {
        return Income::where('frequency', '=', '1')
            ->where('recurring', '=', '1')
            ->sum('amount');
    }

    public static function getNonRecurringIncomesByDay()
    {
        return Income::where('frequency', '=', '1')
            ->sum('amount');

    }

    public static function getRecurringIncomesByWeek()
    {
        return Income::where('frequency', '=', '7')
            ->where('recurring', '=', '1')
            ->sum('amount');

    }

    public static function getNonRecurringIncomesByWeek()
    {
        return Income::where('frequency', '=', '7')
            ->sum('amount');

    }

    public static function getRecurringIncomesByMonth()
    {
        return Income::where('frequency', '=', '30')
            ->where('recurring', '=', '1')
            ->sum('amount');
    }

    public static function getNonRecurringIncomesByMonth()
    {
        return Income::where('frequency', '=', '30')
            ->sum('amount');
    }

    public static function getRecurringIncomesByYear()
    {
        return Income::where('frequency', '=', '365')
            ->where('recurring', '=', '1')
            ->sum('amount');
    }

    public static function getNonRecurringIncomesByYear()
    {
        return Income::where('frequency', '=', '30')
            ->sum('amount');
    }
}
