<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'username'
    ]; // admin => true

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class); // Un usuario puede tener muchos carritos de compra.
    }

    // cart_id
    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->first(); // Si el usuario tiene carrito activo.
        if ($cart)
            return $cart; 

        // else
        $cart = new Cart();       // Si el usuario no tiene carrito de compras activo se crea uno.
        $cart->status = 'Active';
        $cart->user_id = $this->id; // Se crea con el id de este usuario.
        $cart->save(); // Se procede a guardar el carrito.

        return $cart;
    }
}
