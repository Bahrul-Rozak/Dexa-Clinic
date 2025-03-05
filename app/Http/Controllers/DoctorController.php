<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        return view('admin.backend.doctor.index');
    }

    public function create(){
        return view('admin.backend.doctor.create');
    }
}
