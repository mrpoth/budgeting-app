@extends('layouts.main')

@section('body')
<div class="form-container">
<form action="/incomes" name="budget_info" method="POST">
        @csrf
        <div class="form-group">
                <label for="income_title">Income</label><input type="text" name="income_title" id="income_title" class="form-control"/>
        </div>
        <div class="form-group">
        <label for="income_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="income_amount" id="income_amount" class="form-control"/>
        </div>
        <div class="form-group">
        <label for="income_recurring">Is it recurring?</label><select name="income_recurring" id="income_recurring" class="form-control">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="income_frequency">Frequency</label>
        <select name="income_frequency" id="income_frequency" class="form-control">
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="Annually">Annually</option>
        </select>
    </div>
        <button class="btn btn-primary" type="submit">Add Income</button>
    </form>
</div>
@endsection
