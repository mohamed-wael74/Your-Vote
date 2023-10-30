@extends('layouts.home')

@section('content')
    <div class="container">
        <h1 class="center">
            All Polls
        </h1>
  <table class="centered">
        <thead>
          <tr>
              <th>Title</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @foreach($polls as $poll)
            <tr>
                <td>{{$poll->title}}</td>
                <td>

                    <a class="waves-effect waves-light btn red darken-2" href="{{route('poll.delete',[$poll])}}">
                    delete
                    </a>

                    <a class="waves-effect waves-light btn green lighten-0" href="{{route('poll.show',[$poll])}}">
                    show
                    </a>
                </td>
              </tr>

            @endforeach

        </tbody>
      </table>
    </div>

@endsection
