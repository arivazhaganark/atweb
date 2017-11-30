<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;

class CustomerSupport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $inputs = Input::all();
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $from_name = $get_settings->from_email_display_name;
        
        return $this->from($from_email, $from_name)
                ->subject('Customer Support')
                ->view('emails.customer_support');
    }
}
