<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gmail extends Model
{
    public function gmail()
    {
    	return $this->belongsTo(Product::class); // Un detalle pertenece a un producto.
    }
}
