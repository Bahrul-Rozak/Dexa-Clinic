<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index(){
        return view('admin.backend.doctor.index');
    }

    public function create(){
        return view('admin.backend.doctor.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'schedule_id' => 'required|string|max:255',        
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->schedule_id = $request->input('schedule_id');
        $doctor->clinic_id = 0;

        $doctor->save();

        return redirect()->route('doctor.index')->with('message', 'Doctor Created Success');
    }
}
