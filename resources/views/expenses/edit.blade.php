@extends('layouts.main')

@section('body')
<div class="form-container">
  <h1>Edit Expense</h1>
  <form method="POST" action="/expenses/{{$expense->id}}">
    @method('PATCH')
    @csrf
  <div class="form-group">
    <label for="title" class="label">Expense Title</label>
        <input type="text" class="form-control" name="expense_title" placeholder="expense Title" value="{{$expense->expense_title}}">
  </div>
  <div class="form-group">
  <label for="expense_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="expense_amount" id="expense_amount" class="form-control" value="{{$expense->expense_amount}}"/>
        </div>
        <div class="form-group">
        <label for="expense_recurring">Is it recurring?</label><select name="expense_recurring" id="expense_recurring" class="form-control" value="{{$expense->expense_recurring}}">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="expense_frequency">Frequency</label>
    <select name="expense_frequency" id="expense_frequency" class="form-control" value="{{$expense->expense_frequency}}">
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="Annually">Annually</option>
        </select>
    </div>
    <div class="form-group">
              <button type="submit" class="btn btn-primary" name="button">Update Expense</button>
        </div>
</form>
<form method="POST" action="/expenses/{{$expense->id}}">
  @method('DELETE')
  @csrf
  <div class="form-group">
      <div class="control">
        <button type="submit" class="btn btn-danger" name="button">Delete</button>
      </div>
  </div>
</form>
</div>
@endsection
