<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;

class CareerAdmin extends Mailable
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
        $from_name = $inputs['cname'];
        $from_email = $inputs['email'];

        $data = array(
            'cname' => $inputs['cname']
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Online Job Application')
                ->view('emails.career_admin')
                ->with($data);
    }
}
