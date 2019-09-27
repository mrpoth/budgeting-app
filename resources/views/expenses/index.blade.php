@extends('layouts.main')

@section('body')
<form action="" name="budget_info" method="POST">
        @csrf
        <label for="expense_title">Expense</label><input type="text" name="expense_title" id="expense_title"/>
        <label for="expense_amount">Amount</label><input type="text" name="expense_amount" id="expense_amount"/>
        <label for="expense_frequency">Frequency</label>select
    </form>
@endsection
