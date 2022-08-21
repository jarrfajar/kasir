<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index',[
            'users'=>$users,
        ]);
    }

    public function create(){
        $users = User::all();
        return view('user.create',[
            'users'=>$users,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|max:20',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->role = $user->assignRole($request->role);
        
        return redirect()->route('userC')->with('success','User berhasil ditambahkan');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.update',[
            'users'=>$user,
        ]);
    }
}
