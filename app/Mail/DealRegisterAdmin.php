<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;
use Auth;

class DealRegisterAdmin extends Mailable
{
    use Queueable, SerializesModels;

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
        $from_name = $user->first_name.' '.$user->last_name;
        $from_email = $user->email;

        $data = array(
            'partner_name' => $from_name
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Deal Register')
                ->view('emails.deal_register_admin')
                ->with($data);
    }
}
