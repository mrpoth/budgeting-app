@extends('layouts.main')

@section('body')
<div class="form-container">
  <h1>Edit Income</h1>
  <form method="POST" action="/incomes/{{$income->id}}">
    @method('PATCH')
    @csrf
  <div class="form-group">
    <label for="title" class="label">Income Title</label>
        <input type="text" class="form-control" name="income_title" placeholder="Income Title" value="{{$income->income_title}}">
  </div>
  <div class="form-group">
  <label for="income_amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="income_amount" id="income_amount" class="form-control" value="{{$income->income_amount}}"/>
        </div>
        <div class="form-group">
        <label for="income_recurring">Is it recurring?</label><select name="income_recurring" id="income_recurring" class="form-control" value="{{$income->income_recurring}}">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="income_frequency">Frequency</label>
    <select name="income_frequency" id="income_frequency" class="form-control" value="{{$income->income_frequency}}">
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="Annually">Annually</option>
        </select>
    </div>
    <div class="form-group">
              <button type="submit" class="btn btn-primary" name="button">Update Income</button>
        </div>
</form>
<form method="POST" action="/incomes/{{$income->id}}">
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
