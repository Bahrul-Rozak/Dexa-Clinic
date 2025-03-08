<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicationsTypeController extends Controller
{
    public function index(){
        return view('admin.backend.medications-type.index');
    }

    public function create(){
        return view('admin.backend.medications-type.create');
    }
}
