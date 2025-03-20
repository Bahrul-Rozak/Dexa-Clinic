<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function index(){
        $doctors = Doctor::with('clinic')->get();
        return view('frontend.index', compact('doctors'));
    }


    public function patientSignUp(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string|max:20',
            'religion' => 'required|in:islam,kristen,hindu,budha,konghucu',
            'education' => 'required|in:sd,smp,sma,sarjana,master,doctor',
            'occupation' => 'required|in:employed,unemployed',
            'complaint' => 'required|string|max:255',
            'national_id' => 'required|string|max:50',
            'doctor_id' => 'required|exists:doctors,id', // Pastikan dokter ada di DB
        ]);

        // Generate patient code
        $date = now()->format('Ymd');
        $countToday = Patient::whereDate('created_at', now()->toDateString())->count() + 1;
        $patient_code = 'PAT' . $date . str_pad($countToday, 4, '0', STR_PAD_LEFT);

        // Simpan data pasien
        $patient = Patient::create([
            'patient_code' => $patient_code,
            'name' => $request->name,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'religion' => $request->religion,
            'education' => $request->education,
            'occupation' => $request->occupation,
            'national_id' => $request->national_id,
            'doctor_id' => $request->doctor_id,
            'complaint' => $request->complaint,
        ]);

        // Generate queue number
        $today = date('Y-m-d');
        $queueNumber = 1;
        $lastRecord = MedicalRecord::where(DB::raw('DATE(created_at)'), $today)->latest()->first();

        if ($lastRecord) {
            $queueNumber = $lastRecord->queue_number + 1;
        }

        // Simpan rekam medis
        MedicalRecord::create([
            'patient_id' => $patient->id,
            'complaint' => $request->complaint,
            'doctor_id' => $request->doctor_id,
            'queue_number' => str_pad($queueNumber, 3, '0', STR_PAD_LEFT),
        ]);

        // Simpan data antrian ke session
        session()->flash('queueNumber', str_pad($queueNumber, 3, '0', STR_PAD_LEFT));
        session()->flash('nama', $request->name);
        session()->flash('timestamps', now()->format('H:i'));
        session()->flash('arrival_schedule', now()->addMinutes(30)->format('H:i'));
        session()->flash('examination_date', now()->format('Y-m-d'));

        return redirect('/')->with('success', 'Pendaftaran berhasil! Silakan tunggu antrian.');
    }

    public function queue()
    {
        // Ambil pasien yang sedang diperiksa (In Progress)
        $currentPatient = MedicalRecord::where('status', 'In Progress')->first();

        // Kalau tidak ada pasien "In Progress", ambil pasien "Waiting" pertama dan update ke "In Progress"
        if (!$currentPatient) {
            $currentPatient = MedicalRecord::where('status', 'Waiting')->orderBy('created_at')->first();

            if ($currentPatient) {
                $currentPatient->update(['status' => 'In Progress']);
            }
        }

        // Ambil daftar pasien yang masih "Waiting"
        $nextPatients = MedicalRecord::where('status', 'Waiting')->orderBy('created_at')->take(3)->get();

        return view('frontend.queue', compact('currentPatient', 'nextPatients'));
    }

}
