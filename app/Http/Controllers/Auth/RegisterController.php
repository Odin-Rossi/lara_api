<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $req)
    {
        //validate
        $validatedInfo = $this->validate($req, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'email',
            'password' => 'confirmed',
        ]);
        // hash the password
        $validatedInfo['password'] = Hash::make($req->password);

        //reg the user
        User::create($validatedInfo);

        //login the new user
        Auth::attempt($req->only('email', 'password'));

        //redirect to home page
        return redirect()->route('dashboard');
    }

}
