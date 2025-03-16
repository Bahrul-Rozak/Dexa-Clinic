<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(){
        $patient_data = Patient::all();
        return view('admin.backend.patients.index', compact('patient_data'));
    }

    public function create(){
        $doctors = Doctor::with('clinic')->get();
        return view('admin.backend.patients.create', compact('doctors'));
    }

    public function store(Request $request){
        // dd($request->all());
 
         $request->validate([
             'patient_code' => 'nullable|string|max:255',
             'name' => 'required|string|max:255',
             'address' => 'required|string|max:255',
             'birth_date' => 'required|date',
             'gender' => 'required|in:male,female',
             'phone' => 'required|string|max:255',
             'religion' => 'required|in:islam,kristen,hindu,budha,konghucu',
             'education' => 'required|in:sd,smp,sma,sarjana,master,doctor',
             'occupation' => 'required|in:employed,unemployed',
             'national_id' => 'required|string|max:255',
             'doctor_id' => 'required|exists:doctors,id',
             // 'complaint' => 'required|exists:doctors,id',
         ]);

         $date = now()->format('Ymd');
         $countToday = Patient::whereDate('created_at', now()->toDateString())->count() + 1;
         $patient_code = 'PAT' . $date . str_pad($countToday, 4, '0', STR_PAD_LEFT);
 
         Patient::create([
             'patient_code'=>$patient_code,
             'name'=>$request->name,
             'address'=>$request->address,
             'birth_date'=>$request->birth_date,
             'gender'=>$request->gender,
             'phone'=>$request->phone,
             'religion'=>$request->religion,
             'education'=>$request->education,
             'occupation'=>$request->occupation,
             'national_id'=>$request->national_id,
             'doctor_id'=>$request->doctor_id,
             // 'complaint'=>$request->complaint,
         ]);
 
         return redirect()->route('patients.index')->with('message', 'Patient Created Success');
 
     }

     public function edit($id){
        $patient_data = Patient::find($id);
        $doctors = Doctor::with('clinic')->get();
        return view('admin.backend.patients.edit', compact('patient_data', 'doctors'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'patient_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:255',
            'religion' => 'required|in:islam,kristen,hindu,budha,konghucu',
            'education' => 'required|in:sd,smp,sma,sarjana,master,doctor',
            'occupation' => 'required|in:employed,unemployed',
            'national_id' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',  
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validated);

        return redirect()->route('patients.index')->with('message', 'Patient Update Success');

    }

    public function show(){
        $patient_data = Patient::all();
        return view('admin.backend.patients.index', compact('$patient_data'));
    }

    public function destroy($id){
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('message', 'Patient Delete Success');

    }
}
