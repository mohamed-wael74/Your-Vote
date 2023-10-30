@extends('layouts.home')

@section('content')
    <div class="container">

        <h2 class="center">
            {{$poll->title}}
        </h2>

        <form action="{{route('poll.vote',$poll->id)}}" method="post">
            @csrf

            @foreach($poll->options as $option)

               <p>
                <label>
                  <input name="option_id" type="radio"
                  @if ($selected !=null)
                    @if ($selected->option_id == $option->id)
                    checked
                    @endif
                  @endif
                   value="{{$option->id}}"  />
                  <span>{{$option->content}}</span>
                </label>
            </p>
            @endforeach

            @if ($selected ==null)
            <button class="btn btn-primary" type="submit">
                vote
            </button>
            @endif

        </form>
    </div>
@endsection
