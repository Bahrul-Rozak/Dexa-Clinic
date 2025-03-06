<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(){
        return view('admin.backend.clinic.index');
    }

    public function create(){
        return view('admin.backend.clinic.create');
    }

    public function store(Request $request){
       // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Clinic::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('clinic.index')->with('message', 'Clinic Created Success');

    }
}
