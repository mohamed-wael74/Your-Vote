@extends('layouts.home')

@section('content')

    <div class="container my-5">
        <h1 class="my-3 text-center" >Create Election</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Election Form -->
        <div class="row">
            <form action="{{ route('poll.store') }}" method="POST">
                @csrf
                <div class="input-field col s4">
                    <input required="required" name="title" id="title" type="text" class="validate">
                    <label for="title">Title</label>
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input required="required" type="text" class="datepicker" placeholder="start date" name="start_date">
                    <label for="title">start date</label>
                    @error('start_at')
                        {{ $message }}
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input required="required" type="text" class="timepicker" placeholder="start time" name="start_time">
                    <label for="title">start time</label>
                </div>
                <div class="input-field col s4">
                    <input required="required" type="text" class="datepicker" placeholder="end date" name="end_date">
                    <label for="title">end date</label>
                </div>

                <div class="input-field col s4">
                    <input required="required" type="text" class="timepicker" placeholder="end time" name="end_time">
                    <label for="title">end time</label>
                    @error('end_at')
                        {{ $message }}
                    @enderror
                </div>
                @php
                    $a = [1, 2, 3, 4];
                @endphp
                <div class="row col s12" x-data="{
                    optionsNumber: 2
                }">
                    <h4>
                        Options
                    </h4>
                    <template x-for="i,index in optionsNumber">
                        <div class="row">
                            <div class="col s6">
                                <input required="required" name="options[]" id="title" type="text" class="validate"
                                    :placeholder="`Option` + i">
                            </div>

                            <div class="col s6">
                                <button
                                    x-on:click="optionsNumber > 2 ? optionsNumber-- : alert('poll must has at least 2 options')"
                                    class="btn btn-danger" type="button">
                                    Remove
                                </button>
                            </div>
                        </div>
                </div>
                </template>
                <button x-on:click="optionsNumber++" class="btn btn-success" type="button">
                    Add Option
                </button>
                <button class="btn btn-primary col-12"> Create </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dates = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(dates);
            var tiems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(tiems);
        });
    </script>
@endsection
