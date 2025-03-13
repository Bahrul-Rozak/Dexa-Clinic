<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use App\Models\MedicationsType;
use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function index(){
        $medications_data = Medications::with('type')->get();
        return view('admin.backend.medications.index', compact('medications_data'));
    }

    public function create(){
        $medications_type_data = MedicationsType::all();
        return view('admin.backend.medications.create', compact('medications_type_data'));
    }

    public function store(Request $request){
        $request->validate([
            'medication_code' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'type_id' => 'required|exists:medications_type,id',
            'name' => 'required|string|max:255',
            'dosage' => 'nullable|string|max: 255',
            'price' => 'nullable|numeric|min: 0',
            'expiration_date' =>  'nullable|date|min: 0',
        ]);

        Medications::create([
            'medication_code'=>$request->medication_code,
            'stock'=>$request->stock,
            'type_id'=>$request->type_id,
            'name'=>$request->name,
            'dosage'=>$request->dosage,
            'price'=>$request->price,
            'expiration_date'=>$request->expiration_date,
        ]);

        return redirect()->route('medications.index')->with('message', 'Medications Created Success');
    }
}
