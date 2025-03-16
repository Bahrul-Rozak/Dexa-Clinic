<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.backend.user-management.index');
    }

    public function create(){
        return view('admin.backend.user-management.create');
    }
}
