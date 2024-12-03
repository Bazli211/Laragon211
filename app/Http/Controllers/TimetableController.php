<?php

namespace App\Http\Controllers;

use App\Timetable;
use App\Day;
use App\Subject;
use App\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TimetableController extends Controller
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
        $table = Timetable::with('days', 'subjects', 'halls')
        ->where('student_id', auth()->user()->id)
        ->orderBy('day_id', 'asc')
        ->orderBy('time_from', 'asc')
        ->get();

        return view('timetables.index',compact('table'));




        return view('timetables.index' , compact('timetables'));
        //
        //$w = auth();
       // return view('timetables.test', compact('w'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::pluck('name', 'id');

        $halls = Hall::pluck('name', 'id');

        $subjects = Subject::pluck('name', 'id', 'subject_code');

        return view('timetables.create', compact('days', 'subjects', 'halls'));
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
       // dd($request);
        // Timetable::create($request->all());
        Timetable::create([
    		'student_id' => auth()->user()->id?? null,
            //'student_id' =>  $request->user()->id,
           // 'student_id' => Auth::user()->id?? null,
    		'day_id' => $request->day_id?? null,
            'subject_id' => $request->subject_id?? null,
    		'hall_id' => $request->hall_id?? null,
    		'time_from' => $request->time_from,
            'time_to' => $request->time_to,
    	]);


        return redirect()->route('timetables.index')
                        ->with('success','Timetables created successfully.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        $days = Day::pluck('name', 'id');

        $halls = Hall::pluck('name', 'id');

        $subjects = Subject::pluck('name', 'id', 'subject_code');

        return view('timetables.edit',compact('days', 'subjects', 'halls', 'timetable'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update($request->all());

        return redirect()->route('timetables.index')
                        ->with('success','Timetables updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();

        return redirect()->route('timetables.index')
        ->with('success','Timetables deleted successfully');
        //
    }
}
