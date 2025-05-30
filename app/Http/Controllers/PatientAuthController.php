<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.patients.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('patient')->attempt($credentials)) {
    //         return redirect()->route('patient.dashboard');
    //     }

    //     return back()->withErrors(['email' => 'Email or password is incorrect']);
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('patient')->attempt($credentials)) {
            return redirect()->route('patient.dashboard');
        }

        return back()->withErrors(['email' => 'Email or password is incorrect']);
    }

    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('patient.login');
    }
}
