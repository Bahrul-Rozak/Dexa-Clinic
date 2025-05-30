<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function index(){
        return view('admin.backend.message.index');
    }
}
