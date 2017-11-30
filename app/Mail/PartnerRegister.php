<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;


class PartnerRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $inputs;

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
        $name = $inputs['namep'];
        $email = $inputs['email'];
        $company = $inputs['company'];
        //$get_settings = setting();
        //$from_email = $get_settings->from_email;
        //$mail_header = $get_settings->from_email_display_name;
        $from_email = 'channelsales@atnetindia.net';
        $from_name = 'A&T Video Networks';
        
        return $this->from($from_email, $from_name)
                ->subject('Partner Register')
                ->view('emails.partner_register')
                ->with(['name' => $name]);
    }
}
