<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        $schedule_data = Schedule::all();
        return view('admin.backend.schedule.index', compact('schedule_data'));
    }

    public function create(){
        return view('admin.backend.schedule.create');
    }

    public function store(Request $request){
        // dd($request->all());
 
         $request->validate([
             'practice_schedule' => 'required|string|max:255'
         ]);
 
         Schedule::create([
             'practice_schedule'=>$request->practice_schedule,
         ]);
 
         return redirect()->route('schedule.index')->with('message', 'Schedule Created Success');
 
     }
}
