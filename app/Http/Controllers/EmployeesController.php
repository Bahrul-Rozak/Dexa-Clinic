<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return view('admin.backend.employees.index');
    }

    public function create(){
        return view('admin.backend.employees.create');
    }

    public function store(Request $request){
        $request->validate([
            'employee_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string|max:255',
            'religion' => 'required|string|in:islam,kristen,hindu,budha,konghucu',
            'position' => 'required|string|in:nurse,pharmacist,doctor,finance,security',
        ]);

        Employees::create([
            'employee_code'=>$request->employee_code,
            'name'=>$request->name,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'religion'=>$request->religion,
            'position'=>$request->position,
        ]);

        return redirect()->route('employees.index')->with('message', 'Employees Created Success');

    }
}
