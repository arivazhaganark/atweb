<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;


class ForgotPass extends Mailable
{
    use Queueable, SerializesModels;

    public $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct()
     {
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $inputs = Input::all();
        $email = $inputs['email'];
        $user = User::where('email', $email)->first();
        $hashKey = env('APP_KEY');
        $token = hash_hmac('sha256', Str::random(40), $hashKey);
        $link = url('password/reset/'.$token.'?email='.urlencode($email).'');
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $mail_header = $get_settings->from_email_display_name;
        
        return $this->from($from_email, $mail_header)
                ->subject('Forgot Password')
                ->view('emails.forgotpass')
                ->with(['first_name' => $user->first_name, 'last_name' => $user->last_name, 'link' => $link]);
    }
}
