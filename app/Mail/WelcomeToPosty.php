<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeToPosty extends Mailable
{
    use Queueable, SerializesModels;

    public $user;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $temp_url  = route('resetPassword');
        $url = str_replace('posty.test', '127.0.0.1:8000', $temp_url); 
        return $this
            // ->from('example@example.com')
            ->markdown('emails.welcomeToPosty', [
                'url' => $url
            ]);
    }
}
