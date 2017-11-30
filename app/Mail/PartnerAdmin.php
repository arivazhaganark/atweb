<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;

class PartnerAdmin extends Mailable
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
        $company = $inputs['company'];
        $get_settings = setting();
        $from_email = $get_settings->from_email;
        $from_name = $get_settings->from_email_display_name;

        $data = array(
            'companyname' => $company
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Partner Register')
                ->view('emails.partner_admin')
                ->with($data);
    }
}
