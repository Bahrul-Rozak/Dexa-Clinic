<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(){
        return view('admin.backend.patients.index');
    }

    public function create(){
        return view('admin.backend.patients.create');
    }
}
