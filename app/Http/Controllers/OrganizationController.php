<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organization::with('voters','polls')->find(Auth::guard('org')->user()->id);
        #dd($voters);
        return view('organization.index',compact('organization'));
    }


    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|unique:voters,email',
            'industry'=>'required',
            'password'=>'required|min:8'
            ]);
            $organization = new Organization();
            $organization->name = $request->name;
            $organization->email = $request->email;
            $organization->industry = $request->industry;
            $organization->password = Hash::make($request['password']);
            $organization->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
