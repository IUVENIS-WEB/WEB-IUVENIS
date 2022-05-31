<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailController extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( config('mail.from.address'))
        ->subject('Recuperação de senha')
        ->view('email.message')
        ->attach(public_path('images/logo.png'),[
            'as' => 'iuvenis.png',
            'mime' => 'image/png',
        ])
        ->with('data', $this->data);
    }
}