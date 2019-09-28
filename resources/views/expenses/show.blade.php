@extends('layouts.main')

@section('body')
<div class="content-container">
<h3>{{$expense->expense_title}}</h3>
<li>{{$expense->expense_amount}}</li>
<li>{{$expense->expense_frequency}}</li>
@if ($expense->expense_recurring)
<li>Recurring Expense</li>
@endif
</div>
@endsection
