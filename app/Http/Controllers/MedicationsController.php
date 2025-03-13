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
            'medication_code' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'type_id' => 'required|exists:medications_type,id',
            'name' => 'required|string|max:255',
            'dosage' => 'nullable|string|max: 255',
            'price' => 'nullable|numeric|min: 0',
            'expiration_date' =>  'nullable|date|min: 0',
        ]);

        $date = now()->format('Ymd');
        $countToday = Medications::whereDate('created_at', now()->toDateString())->count() + 1;
        $medication_code = 'MED' . $date . str_pad($countToday, 4, '0', STR_PAD_LEFT);

        Medications::create([
            'medication_code'=>$medication_code,
            'stock'=>$request->stock,
            'type_id'=>$request->type_id,
            'name'=>$request->name,
            'dosage'=>$request->dosage,
            'price'=>$request->price,
            'expiration_date'=>$request->expiration_date,
        ]);

        return redirect()->route('medications.index')->with('message', 'Medications Created Success');
    }

    public function edit($id){
        $medications_data = Medications::find($id);
        $medications_type_data = MedicationsType::all();
        return view('admin.backend.medications.edit', compact('medications_data', 'medications_type_data'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'medication_code' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'type_id' => 'required|exists:medications_type,id',
            'name' => 'required|string|max:255',
            'dosage' => 'nullable|string|max: 255',
            'price' => 'nullable|numeric|min: 0',
            'expiration_date' =>  'nullable|date|min: 0',
        ]);

        $medication = Medications::findOrFail($id);

        $medication->update($validated);

        return redirect()->route('medications.index')->with('message', 'Medications Update Success');

    }

    public function show(){
        $medications_data = Medications::all();
        return view('admin.backend.medications.index', compact('$medications_data'));
    }

    public function destroy($id){
        $medication = Medications::findOrFail($id);
        $medication->delete();

        return redirect()->route('medications.index')->with('message', 'Medications Delete Success');

    }
}
