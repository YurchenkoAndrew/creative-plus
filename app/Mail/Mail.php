<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $phone;
    protected $comment;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $phone
     * @param $comment
     */
    public function __construct($name, $email, $phone, $comment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Mail
    {
        return $this->from('bot@creative-plus.kz', 'Creative Plus')
            ->view('emails.mail-message-template', [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'comment' => $this->comment
            ]);
    }
}
