@extends('layouts.main')

@section('body')
<div class="form-container">
  <h1>Edit Income</h1>
  <form method="POST" action="/incomes/{{$income->id}}">
    @method('PATCH')
    @csrf
  <div class="form-group">
    <label for="title" class="label">Income Title</label>
        <input type="text" class="form-control" name="title" placeholder="Income Title" value="{{$income->title}}">
  </div>
  <div class="form-group">
  <label for="amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="amount" id="amount" class="form-control" value="{{$income->amount}}"/>
        </div>
        <div class="form-group">
        <label for="recurring">Is it recurring?</label><select name="recurring" id="recurring" class="form-control" value="{{$income->recurring}}">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="frequency">Frequency</label>
    <select name="frequency" id="frequency" class="form-control" value="{{old('frequency')}}">
            <option value="1">Daily</option>
            <option value="7">Weekly</option>
            <option value="30">Monthly</option>
            <option value="365">Annually</option>
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
