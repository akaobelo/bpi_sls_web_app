<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $subject;

    public $bladeData;

    public function __construct($subject, $bladeData)
    {
        $this->subject = $subject;

        $this->bladeData = $bladeData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailable = $this->view('pages.notices.mails.soa_email',$this->bladeData)->subject($this->subject);
        return $mailable;
    }
}
