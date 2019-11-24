@extends('layouts.main')

@section('body')
    <div class="content-container">
        <h1>Your income Stats</h1>
        <h2>incomes</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">income</th>
                <th scope="col">Amount</th>
                <th scope="col">Frequency</th>
                <th scope="col">Recurring</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{$income->title}}</td>
                    <td>{{$income->amount}}</td>
                    <td>
                        @switch($income->frequency)
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
                        @if ($income->recurring)
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
        <h3>Recurring Weekly: {{$recurring_incomes_by_week}}</h3>
        <h3>Recurring Monthly: {{$recurring_incomes_by_month}}</h3>
        <h3>Recurring Annually: {{$recurring_incomes_by_year}}</h3>
        <a href="/incomes/create">Add new income</a>
    </div>
@endsection
