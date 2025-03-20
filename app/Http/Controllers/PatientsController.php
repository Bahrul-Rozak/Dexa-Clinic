<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\MedicalRecord;
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
        $medical_record = MedicalRecord::where('patient_id', $id)->latest()->first();
        $medical_records = MedicalRecord::where('patient_id', $id)->get();
        return view('admin.backend.patients.edit', compact('patient_data', 'doctors','medical_record', 'medical_records'));
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

    public function storeMedicalRecord(Request $request, $id)
    {
        $request->validate([
            'examination_date' => 'required|date',
            'complaint' => 'required|string',
            'diagnosis' => 'required|string',
            'doctor_id' => 'required|exists:doctors,id', // Pastikan dokter ada di database
            // 'medications' => 'required|nullable'
            'service' => 'required|string|max:255',
            'notes' => 'nullable|string|max:500',
            'treatment' => 'nullable|string|max:500',
            'blood_type' => 'nullable|string|max:3',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'waist' => 'nullable|numeric',
        ]);

        MedicalRecord::create([
            'patient_id' => $id,
            'doctor_id' => $request->doctor_id, // Pastikan ini ada!
            'examination_date' => $request->examination_date,
            'complaint' => $request->complaint,
            'diagnosis' => $request->diagnosis,
            'service' => $request->service,
            'notes' => $request->notes,
            'treatment' => $request->treatment,
            'blood_type' => $request->blood_type,
            'height' => $request->height,
            'weight' => $request->weight,
            'waits' => $request->waist,
            // 'medications' => $request->medications
        ]);

        return redirect()->back()->with('message', 'Medical record added successfully');
    }

    public function destroyMedicalRecord($id)
    {
        $record = MedicalRecord::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('message', 'Medical record deleted successfully');
    }
}
