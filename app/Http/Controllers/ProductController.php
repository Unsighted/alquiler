<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CartDetail;

class ProductController extends Controller
{
    public function show(CartDetail $cart_detail, $id)
    {
		$product = Product::find($id);
		$productId = $product->id;
		$images = $product->images;
    	$imagesLeft = collect();
    	$imagesRight = collect();
    	foreach ($images as $key => $image) {
    		if ($key%2==0)
    			$imagesLeft->push($image);
    		else
				$imagesRight->push($image);
		
		
				$details = $cart_detail->paginate(1);
				
				$productDi = $details['0'];
				
				
		}	
    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight', 'productId'));
	} 
	}




	
	
	

