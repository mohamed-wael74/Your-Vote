<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Poll;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class VoterController extends Controller
{

    public function index()
    {
        $poll = Voter::with('polls','votes')->find(Auth::guard('voter')->user()->id);
        return view('voter.index',compact('poll'));
    }

    public function create()
    {
        return view('voter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|unique:voters,email',
            'org_code'=>'required|numeric',
            'ssn'=>'required|numeric|unique:voters,SSN',
            'password'=>'required|min:8'
            ]);
            $voter = new Voter();
            $voter->name = $request->name;
            $voter->email = $request->email;
            $voter->org_code = $request->org_code;
            $voter->SSN =$request->ssn;
            $voter->password = Hash::make($request['password']);
            $voter->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voter = Voter::find($id);
        $voter->delete();
        return redirect()->back();
    }
}
