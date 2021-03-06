<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Auth;


class ResellerAdmin extends Mailable
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
        //$from_name = $inputs['frimname'];
        //$from_email = $inputs['email'];
       
        $get_settings = setting();
        $from_name = $get_settings->from_email_display_name;
        $from_email = $get_settings->from_email;
       
        $user_id = Auth::guard('user')->user()->id;
        $user = User::where('id', $user_id)->first();
        $partner_name = $user->first_name.' '.$user->last_name;

        $data = array(
            'partner_name' => $partner_name
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Re Seller Account Opening form')
                ->view('emails.reseller_admin')
                ->with($data);
    }
}
