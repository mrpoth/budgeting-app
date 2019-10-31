@extends('layouts.main')

@section('body')
<div class="content-container">
<h1>Your Expense Stats</h1>
<h2>Expenses</h2>
<table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Expense</th>
            <th scope="col">Amount</th>
            <th scope="col">Frequency</th>
            <th scope="col">Recurring</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($expenses as $expense)
  <tr>
      <th scope="row">{{$expense->id}}</th>
      <td>{{$expense->title}}</td>
      <td>{{$expense->amount}}</td>
      <td>
          @switch($expense->frequency)
              @case(1)
              Daily
                  @break
              @case(7)
              Weekly
                  @break
              @case(30)
              Monthly
                  @break
              @case(365)
              Annually
                  @break
              @default

          @endswitch
        </td>
      <td>
          @if ($expense->recurring)
          Yes
          @else
          No
      @endif
        </td>
      <td><a href="/expenses/{{$expense->id}}/edit">Edit</a></td>
  </tr>
@endforeach
        </tbody>
      </table>
    <h3> Total expenses: {{$expense_totals}}</h3>
    <h3>Weekly: {{$weekly_expenses}}</h3>
    <h3>Monthly: {{$monthly_expenses}}</h3>
    <h3>Annually: {{$annual_expenses}}</h3>
    <a href="/expenses/create">Add new expense</a>
</div>
</div>
@endsection
