<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\User;
use App\Cart;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cart;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Cart $cart, Request $request )
    {
        $this->user = $user;
        $this->cart = $cart;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-order')
            ->subject('Un cliente ha realizado un nuevo pedido!');
    }
}
