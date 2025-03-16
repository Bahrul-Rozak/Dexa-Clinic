<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user_data = User::all();
        return view('admin.backend.user-management.index', compact('user_data'));
    }

    public function create()
    {
        return view('admin.backend.user-management.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|max:255',
            'is_super_admin' => 'required|in:0,1',
            'is_admin' => 'required|in:0,1'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'is_super_admin' => $request->is_super_admin,
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('user-management.index')->with('message', 'User Created Success');
    }

    public function edit($id)
    {
        $user_data = User::find($id);
        return view('admin.backend.user-management.edit', compact('user_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' .$id,
            'password' => 'nullable|string|max:255',
            'confirm' => 'nullable|string|max:255',
            'is_super_admin' => 'required|in:0,1',
            'is_admin' => 'required|in:0,1'
        ]);

        $user = User::findOrFail($id);

        if($request->confirm_password){
            $user->password = Hash::make($request->confirm_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_super_admin = $request->is_super_admin;
        $user->is_admin = $request->is_admin;

        $user->save();

        return redirect()->route('user-management.index')->with('message', 'User Update Success');
    }
}
