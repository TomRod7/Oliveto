<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $data;

     public function __construct($data)
     {
         $this->data = $data;
     }

     public function build()
     {
         return $this
             ->subject('Pedido '.date('Y-m-d H:i:s'))
             ->view('emails.order');
     }
}
