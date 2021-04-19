<?php

namespace App\Http\Controllers;

class EmailTesterController extends Controller
{
    public function email1()
    {
        return 'email 1';
    }

    public function email2()
    {
     return view('emails.passwordResetEmail', [
    'userEmail' =>'fbag@gmail.com',
    'url' => str_replace('posty.test', '127.0.0.1', route('resetPassword')),
]);

    }

}
