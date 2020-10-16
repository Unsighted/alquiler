<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    
    public function carousel()
    {
    	return $this->belongsTo(Carousel::class);
    }

}
