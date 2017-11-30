<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;
use Hash;


class ClientReply extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($user)
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
        $password = $this->randomPassword();
        User::where('id', $this->user->id)->update(array('password' => Hash::make($password)));  
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $mail_header = $get_settings->from_email_display_name;
        
        return $this->from($from_email, $mail_header)
                ->subject('Customer login information')
                ->view('emails.client_reply')
                ->with(['first_name' => $this->user->first_name, 'last_name' => $this->user->last_name , 'email' => $this->user->email, 'password' => $password]);         
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
