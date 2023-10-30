@extends('layouts.home')
@section('content')

    <h1 class="center my-5">
        {{ $poll->title }}
    </h1>
    <div class="container col-6 my-5">
        <table class="table table-dark">
            <tr>
                <th>Title</th>
                <th>Options</th>
                <th>Number of votes</th>
            </tr>

            @foreach ($poll->options as $option)
                <tr>
                    <td> {{ $poll->title }} </td>
                    <td>{{ $option->content }}</td>
                    <td>{{ $option->votes_count }}</td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
