<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\frontend\Deal_register;


class DealEndUser extends Mailable
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
    public function build(Request $request)
    {
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $from_name = $get_settings->from_email_display_name;

        $id = $request->segment(4);
        $deal = Deal_register::where('id', $id)->select('*')->first();
        $endcustomer = $deal->endcustomer;
        $user = User::where('id', $deal->user_id)->first();
        $partner_name = $user->first_name.' '.$user->last_name;

        $data = array(
            'end_user' => $endcustomer,
            'partner_name' => $partner_name
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Deal Approval')
                ->view('emails.deal_end_user')
                ->with($data);
    }
}
