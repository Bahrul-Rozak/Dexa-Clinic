<?php

namespace App\Http\Controllers;

use App\Models\MedicationsType;
use Illuminate\Http\Request;

class MedicationsTypeController extends Controller
{
    public function index(){
        $medications_type_data = MedicationsType::all();
        return view('admin.backend.medications-type.index', compact('medications_type_data'));
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

     public function edit($id){
        $medications_type_data = MedicationsType::find($id);
        return view('admin.backend.medications-type.edit', compact('medications_type_data'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'medication_type' => 'required|string|max:255',
        ]);

        $type = MedicationsType::findOrFail($id);

        $type->update($validated);

        return redirect()->route('medications-type.index')->with('message', 'Medications Type Update Success');

    }
}
