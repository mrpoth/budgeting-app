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
      <td>{{$expense->expense_title}}</td>
      <td>{{$expense->expense_amount}}</td>
      <td>{{$expense->expense_frequency}}</td>
      <td>
          @if ($expense->expense_recurring)
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
      <h3>Total expenses: {{$expense_totals}} </h3>
<a href="/expenses/create">Add new expense</a>
</div>
</div>
@endsection
