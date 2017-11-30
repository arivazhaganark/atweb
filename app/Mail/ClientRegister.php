<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;


class ClientRegister extends Mailable
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
        //$email = $inputs['email'];
        //$password = $inputs['password'];
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $mail_header = $get_settings->from_email_display_name;
        //$company = $inputs['company_name'];

        return $this->from($from_email, $mail_header)
                ->subject('Customer Registration')
                ->view('emails.client_register');
    }
}
