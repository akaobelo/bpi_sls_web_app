<?php

namespace App\Mail;

use App\Models\Notice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $path;

    public $subject;

    public $bladeData;

    public $noticeType;

    public function __construct($path,$subject,$bladeData,$noticeType)
    {
        $this->path = $path;

        $this->subject = $subject;

        $this->bladeData = $bladeData;

        $this->noticeType = $noticeType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->noticeType){
            case Notice::FIRST_NOTICE:
                    $mailable = $this->view('pages.notices.letters.first_notice',$this->bladeData)->subject($this->subject);
                break;
            case Notice::SECOND_NOTICE:
                    $mailable = $this->view('pages.notices.letters.second_notice',$this->bladeData)->subject($this->subject);
                break;
            case Notice::THIRD_NOTICE:
                    $mailable = $this->view('pages.notices.letters.third_notice',$this->bladeData)->subject($this->subject);
                break;
            case Notice::TURNOVER_NOTICE:
                    $mailable = $this->view('pages.notices.letters.takeover_notice',$this->bladeData)->subject($this->subject);
                break;
        }


        $mailable->attach(storage_path("app/$this->path"));

        return $mailable;
    }
}
