<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Illuminate\Support\Str;


class VisitorAdmin extends Mailable
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
        $from_name = $inputs['visitors_name'];
        $from_email = $inputs['visitors_email'];

        $data = array(
            'visitors_name' => $from_name
        );
        
        return $this->from($from_email, $from_name)
                ->subject('Visitor Register')
                ->view('emails.visitor_admin')
                ->with($data);
    }
}
