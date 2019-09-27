@extends('layouts.main')

@section('body')
<form action="/incomes" name="budget_info" method="POST">
        @csrf
        <label for="income_title">Income</label><input type="text" name="income_title" id="income_title"/>
        <label for="income_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="income_amount" id="income_amount"/>
        <label for="income_frequency">Frequency</label>
        <select name="income_frequency" id="income_frequency">
            <option value="1">Daily</option>
            <option value="7">Weekly</option>
            <option value="30">Monthly</option>
            <option value="365">Annually</option>
        </select>
        <button type="submit">Add Income</button>
    </form>
@endsection
