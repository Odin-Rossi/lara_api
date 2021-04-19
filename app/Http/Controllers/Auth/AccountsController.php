<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetEmailWithToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountsController extends Controller
{
    public function forgotPassword()
    {
        //  return 'password requess form goes here';
        return view('auth.forgotPassword');
    }

    public function forgotPassword_store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // check if user exists in db
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }
        //create password reset token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now(),
        ]);

        //Get the token just created above (the most latest token)
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->latest()->pluck('token')->first();
        Mail::to($request->email)->send(new PasswordResetEmailWithToken($user, $tokenData));

        // Mail::failures() returns an array of failed emails
        if (count(Mail::failures()) > 0) {
            return back()->with(['sms_bad' => 'Oops! A Network Error occurred. Please try again.']);
        } else {
            return back()->with(['sms_good' => "A reset link has been sent to  {$user->email} "]);
        }
    }

    public function resetPassword()
    {
        return view('auth.resetPassword');
    }

    public function resetPassword_store(Request $request)
    {
        //validation first
        $this->validate($request, [
            'token' => 'unique:password_resets,token',
            'password' => 'bail|required|confirmed|min:5|max:32',
        ]);

        //trace the token to the user who requested it and set the new password for that user
        $email = DB::table('password_resets')->where('token', $request->tokenz)->pluck('email')->first();
        $user = User::where('email', $email)->first();

        //setting the new password for the user and cleaning out the closet
        if ($user->password = Hash::make($request->password) && $user->save()) {
            // delete the token from the db and redirect back with success sms
            return back()->with('sms_good', 'Password Updated successfully');
        }
        return back()->with('sms_bad', 'Oops! Password Update Failed. Try again');

    }

}
