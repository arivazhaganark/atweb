<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;


class ResellerUser extends Mailable
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
        //$inputs = Input::all();
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $mail_header = $get_settings->from_email_display_name;
        
        return $this->from($from_email, $mail_header)
                ->subject('Re Seller Account Opening form')
                ->view('emails.reseller_user');
    }
}
