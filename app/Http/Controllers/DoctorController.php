<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Database\Events\SchemaDumped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index(){
        $doctor_data = Doctor::with(['clinic', 'schedule'])->get();
        return view('admin.backend.doctor.index', compact('doctor_data'));
    }

    public function create(){
        $clinics = Clinic::all();
        $schedules = Schedule::all();
        return view('admin.backend.doctor.create', compact('clinics', 'schedules'));
    }

    public function store(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'schedule_id' => 'required|exists:schedules,id', 
            'clinic_id' => 'required|exists:clinics,id'       
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Doctor::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'schedule_id' => $request->schedule_id,
            'clinic_id' => $request->clinic_id,
        ]);

        return redirect()->route('doctor.index')->with('message', 'Doctor Created Success');
    }

    public function edit($id){
        $doctor_data = Doctor::find($id);
        $clinics = Clinic::all();
        $schedules = Schedule::all();
        return view('admin.backend.doctor.edit', compact('doctor_data', 'clinics', 'schedules'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'schedule_id' => 'required|exists:schedules,id', 
            'clinic_id' => 'required|exists:clinics,id'       
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($validated);

        return redirect()->route('doctor.index')->with('message', 'Doctor Update Success');

    }

    public function show(){
        $doctor_data = Doctor::all();
        return view('admin.backend.doctor.index', compact('doctor_data'));
    }

    public function destroy($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('message', 'Doctor Delete Success');

    }
}
