<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Wallpaper;
use File;

class TestController extends Controller
{

    public function welcome()
    {

        $photo = \DB::table('wallpapers')->first();

        if(empty($photo)){
            $photo = 'default.gif';
        }else{    
            $photo = $photo->path;
        }
        
        $carousel = \DB::table('carousels')->get();

        if(empty($carousel)){
            $carousel = 'default.gif';
        }else{    
            $carousel = $carousel;
        }
        
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories', 'photo', 'carousel'));
    }

}
