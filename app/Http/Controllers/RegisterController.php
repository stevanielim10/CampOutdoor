<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'image' =>'required|image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        $user = new User();
        $user ->name = $validatedData['name'];
        $user ->username = $validatedData['username'];
        $user ->email = $validatedData['email'];
        $user ->password = $validatedData['password'] = Hash::make($validatedData['password']);
        $user->role_id = $request->role_id;
        if($request->file('image')){
            $user->image = $request->file('image')->store('user-images');
        }
        $user->save();

        // User::create($validatedData);



        //$request->session()->flash('success', 'Registration success ! Please Login');

        return redirect('/login')->with('success', 'Registration success ! Please Login');;
    }
}
