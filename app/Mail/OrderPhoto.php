<?php

namespace App\Mail;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPhoto extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;

    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('official@stockies.id','Stockies');

        foreach($this->cart as $photo){
          $email->attach(public_path('storage/original_photo/'.$photo->photo->nama.'_'.$photo->path), [
              'as' => $photo->photo->nama.'_'.$photo->ukuran
          ]);
        }

        $email->subject('Order Photo')->view('mail.order-photo');
    }
}
