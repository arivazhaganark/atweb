<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Auth;


class DemoRequestAdmin extends Mailable
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
        $user_id = Auth::guard('user')->user()->id;
        $user = User::where('id', $user_id)->first();
        $name = $user->first_name.' '.$user->last_name;

        $get_settings = setting();
        $from_name = $get_settings->from_email_display_name;
        $from_email = $get_settings->from_email;

        return $this->from($from_email, $from_name)
                ->subject('Demo request form')
                ->view('emails.demo_request_admin')
                ->with(['name' => $name]);
    }
}
