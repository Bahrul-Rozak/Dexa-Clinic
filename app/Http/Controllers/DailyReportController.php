<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index(){
        $reports = MedicalRecord::all();
        return view('admin.backend.daily-report.index', compact('reports'));
    }
}
