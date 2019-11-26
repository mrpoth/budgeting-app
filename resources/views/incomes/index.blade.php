@extends('layouts.main')

@section('body')
    <div class="content-container">
        <h2>One-off incomes</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Income</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($non_recurring_incomes as $non_recurring_income)
                <tr>
                    <td>{{$non_recurring_income->title}}</td>
                    <td>{{$non_recurring_income->amount}}</td>
                    <td><a href="/incomes/{{$non_recurring_income->id}}/edit">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h2>Recurring incomes</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Income</th>
                <th scope="col">Frequency</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($recurring_incomes as $recurring_income)
                    <td>{{$recurring_income->title}}</td>
                    <td>
                        @switch($recurring_income->frequency)
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
                    <td>{{$recurring_income->amount}}</td>
                    <td><a href="/incomes/{{$recurring_income->id}}/edit">Edit</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h2>Recurring income totals</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Daily</th>
                <th scope="col">Weekly</th>
                <th scope="col">Monthly</th>
                <th scope="col">Annually</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$recurring_incomes_by_day}}</td>
                <td>{{$recurring_incomes_by_week}}</td>
                <td>{{$recurring_incomes_by_month}}</td>
                <td>{{$recurring_incomes_by_year}}</td>
            </tr>
            </tbody>
        </table>
        <a href="/incomes/create">Add new income</a>
    </div>
@endsection

