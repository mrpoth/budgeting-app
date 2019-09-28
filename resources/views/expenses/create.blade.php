@extends('layouts.main')

@section('body')
<div class="form-container">
        <form action="/expenses" name="budget_info" method="POST">
                @csrf
                <div class="form-group">
                        <label for="expense_title">Expense</label><input type="text" name="expense_title" id="expense_title" class="form-control"/>
                </div>
                <div class="form-group">
                <label for="expense_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="expense_amount" id="expense_amount" class="form-control"/>
                </div>
                <div class="form-group">
                <label for="expense_recurring">Is it recurring?</label><select name="expense_recurring" id="expense_recurring" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="expense_frequency">Frequency</label>
                <select name="expense_frequency" id="expense_frequency" class="form-control">
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Annually">Annually</option>
                </select>
            </div>
                <button class="btn btn-primary" type="submit">Add expense</button>
            </form>
        </div>
@endsection
