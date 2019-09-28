@extends('layouts.main')

@section('body')
<div class="content-container">
<h3>{{$income->income_title}}</h3>
<li>{{$income->income_amount}}</li>
<li>{{$income->income_frequency}}</li>
@if ($income->income_recurring)
<li>Recurring Expense</li>
</div>
@endif
@endsection
