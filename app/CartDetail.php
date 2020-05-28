<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{

	// CartDetail N               1 Product
    public function product()
    {
    	return $this->belongsTo(Product::class); // Un detalle pertenece a un producto.
    }
}
