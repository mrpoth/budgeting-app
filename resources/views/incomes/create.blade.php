@extends('layouts.main')

@section('body')
<div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="/incomes" name="budget_info" method="POST">
        @csrf
        <div class="form-group">
                <label for="title">Income</label><input type="text" name="title" id="title" class="form-control"/>
        </div>
        <div class="form-group">
        <label for="amount">Amount</label><input type="text" pattern="^[-+]?\d+(\.\d+)?$" name="amount" id="amount" class="form-control"/>
        </div>
        <div class="form-group">
        <label for="recurring">Is it recurring?</label><select name="recurring" id="recurring" class="form-control">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="frequency">Frequency</label>
        <select name="frequency" id="frequency" class="form-control">
            <option value="1">Daily</option>
            <option value="7">Weekly</option>
            <option value="30">Monthly</option>
            <option value="365">Annually</option>
        </select>
    </div>
        <button class="btn btn-primary" type="submit">Add Income</button>
    </form>
</div>
@endsection
