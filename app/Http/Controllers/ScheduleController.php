<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        return view('admin.backend.schedule.index');
    }

    public function create(){
        return view('admin.backend.schedule.create');
    }
}
