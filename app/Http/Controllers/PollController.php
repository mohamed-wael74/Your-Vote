<?php

namespace App\Http\Controllers;

use App\Enums\PollStatus;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;


class PollController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'start_at' => ['required', 'date' ,'after_or_equal:now'],
            'end_at' => ['required', 'date' ,'after:start_at'],
            'options' => ['required'],
        ]);
        #dd($request->options);
        $poll = Poll::create([
            'title' =>  $request->title,
            'created_by'    =>  Auth::guard('org')->user()->id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);
        foreach($request->options as $option)
        {
            $option = Option::create([
                'poll_id'   =>  $poll->id,
                'content'   =>  $option,
                'votes_count'   =>  0,
            ]);
        }
        return redirect()->route('organization.index');
    }

    public function index()
    {
        $polls = Poll::where('created_by',Auth::guard('org')->user()->id)->get();
        return view('polls.list', compact('polls'));
    }

    public function edit(Poll $poll)
    {
        abort_if(auth()->user()->isNot($poll->user), 403);
        abort_if($poll->status != PollStatus::PENDING->value, 404);

        $poll = $poll->load('options');
        return view('polls.update', compact('poll'));
    }

    public function update(UpdatePollRequest $request, Poll $poll)
    {

        $data = $request->safe()->except('options');

        $poll->update($data);

        $poll->options()->delete();

        $poll->options()->createMany($request->options);

        return to_route('poll.index');
    }

    public function destroy($poll_id)
    {

        $poll = Poll::find($poll_id);
        $poll->delete();
        return redirect()->back();
    }

    public function show($poll_id)
    {
        $poll = Poll::with('options')->find($poll_id);
        $selected = Vote::where('poll_id',$poll_id)->where('user_id',Auth::guard('voter')->user()->id)->first();
        #dd($selected);
        return view('polls.show',compact('poll','selected'));
    }

    public function showDetails($poll_id)
    {
        $poll = Poll::with('options')->find($poll_id);
        return view('polls.Show-details',compact('poll'));
    }

    public function vote(Request $request, $poll_id)
    {

        $request->validate([
            'option_id' =>  'required'
        ]);
        #dd($request->option_id);
        $option = Option::find($request->option_id);
        $option->votes_count = $option->votes_count + 1 ;
        $option->save();
        $vote = Vote::create([
            'poll_id'   =>  $poll_id,
            'option_id' =>  $request->option_id,
            'user_id'   =>  Auth::guard('voter')->user()->id,
        ]);
        return redirect()->route('voter.index');
    }
}
