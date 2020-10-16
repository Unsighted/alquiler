<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    
    public function wallpaper()
    {
    	return $this->belongsTo(Wallpaper::class);
    }

}
