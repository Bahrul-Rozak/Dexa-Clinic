<?php

namespace App\Http\Controllers;

use App\Models\MedicationsType;
use Illuminate\Http\Request;

class MedicationsTypeController extends Controller
{
    public function index(){
        return view('admin.backend.medications-type.index');
    }

    public function create(){
        return view('admin.backend.medications-type.create');
    }

    public function store(Request $request){
        // dd($request->all());
 
         $request->validate([
             'medication_type' => 'required|string|max:255'
         ]);
 
         MedicationsType::create([
             'medication_type'=>$request->medication_type,
         ]);
 
         return redirect()->route('medications-type.index')->with('message', 'Medications Type Created Success');
 
     }
}
