<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;


class DemoFeedbackUser extends Mailable
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
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $from_name = $get_settings->from_email_display_name;

        return $this->from($from_email, $from_name)
                ->subject('Demo feedback form')
                ->view('emails.demo_feedback_user');
    }
}
