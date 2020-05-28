<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details()
    {
    	return $this->hasMany(CartDetail::class); // Un carrito puede tener muchos detalles.
    }

    public function getTotalAttribute()
    {
    	$total = 1.0;
    	foreach ($this->details as $detail) {
    		$total += $detail->quantity * 999;
    	}
    	return $total;
    }
}
