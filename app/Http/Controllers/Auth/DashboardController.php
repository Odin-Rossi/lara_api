<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
         return $this->middleware('auth')->except('index1');
    }
    
    
    


    public function index()
    {
      
        // Storage::make();
        return view('auth.dashboard');

    }

      public function index1()
    {
        return view('welcome');


    }

}
