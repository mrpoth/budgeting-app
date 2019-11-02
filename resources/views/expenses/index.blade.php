@extends('layouts.main')

@section('body')
<div class="content-container">
<h1>Your Expense Stats</h1>
<h2>Expenses</h2>
<table class="table table-dark">
        <thead>
          <tr>
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
    <h3>Recurring Weekly: {{$recurring_expenses_by_week}}</h3>
    <h3>Recurring Monthly: {{$recurring_expenses_by_month}}</h3>
    <h3>Recurring Annually: {{$recurring_expenses_by_year}}</h3>
    <a href="/expenses/create">Add new expense</a>
@endsection
