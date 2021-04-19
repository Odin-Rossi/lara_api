<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmailWithToken extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;
    /**
     * Create a new message instance.
     * @param $user refers to the user to be mailed
     * @param $token refers to the reset Token to be used for resetting the password
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.passwordResetEmail', [
            'user' => $this->user,
            'url' => str_replace('posty.test', '127.0.0.1', route('resetPassword',
                [
                    'token' => $this->token,
                    'email' => $this->user->email,
                ]))
        ]);
    }
}
