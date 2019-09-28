@extends('layouts.main')

@section('body')
<div class="content-container">
<h1>Your Income Stats</h1>
<h2>Incomes</h2>
<table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Income</th>
            <th scope="col">Amount</th>
            <th scope="col">Frequency</th>
            <th scope="col">Recurring</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($incomes as $income)
  <tr>
      <th scope="row">{{$income->id}}</th>
      <td>{{$income->income_title}}</td>
      <td>{{$income->income_amount}}</td>
      <td>{{$income->income_frequency}}</td>
      <td>
          @if ($income->income_recurring)
          Yes
          @else
          No
      @endif
        </td>
      <td><a href="/incomes/{{$income->id}}/edit">Edit</a></td>
  </tr>
@endforeach
        </tbody>
      </table>
      <h3>Total income: {{$income_totals}} </h3>
<a href="/incomes/create">Add new income</a>
</div>
@endsection
