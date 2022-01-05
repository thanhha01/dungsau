<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $datas = [];

    public function __construct($params = [])
    {
        $this->datas = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code = $this->datas['code'] ?? "********";
        $fromConf = config("mail.from");
        return $this
            ->from($fromConf['address'], $fromConf['name'])
            ->subject("Verify Account")
            ->view('mail.confirm_mail', compact("code"));
    }
}
