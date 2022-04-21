<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    // classe responsabile per invio email
    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_lead)
    {
        $this -> lead = $_lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // risposta email a chi mi contattata
        return $this->replyTo($this->lead->email);
        return $this->view('emails.new-contact');
    }
}