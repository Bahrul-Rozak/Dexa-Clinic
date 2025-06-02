<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MedicalRecord; // pastikan ini di atas
use JD\Cloudder\Facades\Cloudder; // import Cloudder


class PatientProfileController extends Controller
{
    // public function edit()
    // {
    //     $patient = Auth::guard('patient')->user();
    //     return view('frontend.patients.edit-profile', compact('patient'));
    // }

    public function edit()
    {
        $patient = Auth::guard('patient')->user();
        $medicalRecords = $patient->medicalRecords()->latest()->get(); // ambil relasi

        return view('frontend.patients.edit-profile', compact('patient', 'medicalRecords'));
    }


    public function update(Request $request)
    {
        $patient = Auth::guard('patient')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'password' => 'nullable|string|min:6|confirmed', // password_confirmation field di form
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->birth_date = $request->birth_date;
        $patient->gender = $request->gender;
        $patient->phone = $request->phone;
        $patient->email = $request->email;

        if ($request->filled('password')) {
            $patient->password = Hash::make($request->password);
        }

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            // Upload ke Cloudinary
            Cloudder::upload($image->getRealPath(), null);

            $uploadResult = Cloudder::getResult();

            // Simpan URL gambar di DB
            $patient->picture = $uploadResult['secure_url'];
        }


        $patient->save();

        return redirect()->route('patient.profile.edit')->with('message', 'Profile updated successfully!');
    }
}
