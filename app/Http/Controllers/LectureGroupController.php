<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use DB;

class LectureGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::all();
  
        return view('groups.index',compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $this->validate($request, Group::rules()); 
        $time = now();
        DB::table('lecture_groups') // Filter by subject ID
        ->insert([
            'name' => $request->name,
            'part' => $request->part,
            'total_students' => $request->total_students,
            'created_at' => $time,
            'updated_at' => $time
        ]);
   
        return redirect()->route('groups.index')
                        ->with('success','Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, Group::rules());
        
        $group->update([
            'name' => $request->name,
            'part' => $request->part,
            'total_students' => $request->total_students,
        ]);
    
        return redirect()->route('groups.index')
            ->with('success', 'Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
       $group->delete();

       return redirect()->route('groups.index')
       ->with('success','Group deleted successfully');
    }
}