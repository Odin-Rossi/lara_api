<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // login
        if (!auth()->attempt($request->only('email', 'password'))){
            return back()->with('failed_status', 'Incorrect credentials');
        }
        return redirect()->route('dashboard');
    }
    
    
    
}
