<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index(){
        $doctor_data = Doctor::all();
        return view('admin.backend.doctor.index', compact('doctor_data'));
    }

    public function create(){
        return view('admin.backend.doctor.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'practice_schedule' => 'required|string|max:255',        
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->practice_schedule = $request->input('practice_schedule');
        $doctor->clinic_id = null;

        $doctor->save();

        return redirect()->route('doctor.index')->with('message', 'Doctor Created Success');
    }

    public function edit($id){
        $doctor_data = Doctor::find($id);
        return view('admin.backend.doctor.edit', compact('doctor_data'));
    }

    public function update(Request $request, $id){
        dd($request->all());
    }
}
