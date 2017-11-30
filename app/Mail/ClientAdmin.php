<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;

class ClientAdmin extends Mailable
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
        $name = $inputs['customer_usename'];
        $name = explode(' ', $name);
        $last_name = '';
        if(count($name)==1) {            
            $first_name = $name[0];                
        } else {
            $first_name = $name[0];
            $last_name = $name[1];
        }
        $from_name = $first_name.' '.$last_name;
        $from_email = $inputs['email'];
        $company = $inputs['company_name'];
        
        return $this->from($from_email, $from_name)
                ->subject('Customer Registration')
                ->view('emails.client_admin')
                ->with(['company' => $company]);
    }
}
