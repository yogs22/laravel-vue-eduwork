<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * http://127.0.0.1:8000/member?gender=L&_=1673270618078
     * return view('admin.member.index', compact('members'));
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index');
    }
    
    public function api(Request $request) 
    {
        $members = Member::when($request->gender, function($q) use($request) {
            return $q->where('gender', $request->gender);
        })->get();

        $datatables = datatables()->of($members)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'gender' => ['required', 'max:1'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required', 'max:300'],
            'email' => ['required'],
            ]);


        Member::create($request->all());

        
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'gender' => ['required', 'max:1'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required', 'max:300'],
            'email' => ['required'],
            ]);


        $member->update($request->all());


        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index');
    }
}


