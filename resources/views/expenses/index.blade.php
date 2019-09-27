@extends('layouts.main')

@section('body')
<form action="/expenses" name="budget_info" method="POST">
        @csrf
        <label for="expense_title">Expense</label><input type="text" name="expense_title" id="expense_title"/>
        <label for="expense_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="expense_amount" id="expense_amount"/>
        <label for="expense_frequency">Frequency</label>
        <select name="expense_frequency" id="expense_frequency">
            <option value="1">Daily</option>
            <option value="7">Weekly</option>
            <option value="30">Monthly</option>
        </select>
        <button type="submit">Add Expense</button>
    </form>
@endsection
