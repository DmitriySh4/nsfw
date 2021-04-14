<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $price;
    public $order_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $price, $order_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nsfw@outsourcing.com')->view('email.send');
    }
}
