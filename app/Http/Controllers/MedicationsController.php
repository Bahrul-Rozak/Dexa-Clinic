<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function index(){
        return view('admin.backend.medications.index');
    }
}
