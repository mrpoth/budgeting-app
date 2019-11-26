@extends('layouts.main')

@section('body')
    <div class="content-container">
        <h2>One-off expenses</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Expense</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($non_recurring_expenses as $non_recurring_expense)
                <tr>
                    <td>{{$non_recurring_expense->title}}</td>
                    <td>{{$non_recurring_expense->amount}}</td>
                    <td><a href="/expenses/{{$non_recurring_expense->id}}/edit">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h2>Recurring expenses</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Expense</th>
                <th scope="col">Frequency</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($recurring_expenses as $recurring_expense)
                    <td>{{$recurring_expense->title}}</td>
                    <td>
                        @switch($recurring_expense->frequency)
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
                    <td>{{$recurring_expense->amount}}</td>
                    <td><a href="/expenses/{{$recurring_expense->id}}/edit">Edit</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h2>Recurring expense totals</h2>
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
                <td>{{$recurring_expenses_by_day}}</td>
                <td>{{$recurring_expenses_by_week}}</td>
                <td>{{$recurring_expenses_by_month}}</td>
                <td>{{$recurring_expenses_by_year}}</td>
            </tr>
            </tbody>
        </table>
        <a href="/expenses/create">Add new expense</a>
    </div>
@endsection

