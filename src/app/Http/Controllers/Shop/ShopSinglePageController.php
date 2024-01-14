<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopSinglePageController extends Controller
{
    public function index($slug)
    {
        $products = Product::where('slug', $slug)->firstOrFail();
        //       get and explode size product
        $sizeStr = $products->size;
        $sizes = explode('/', $sizeStr);
        //      get image from product_image table
        $productsImages = Product::find($products->id);
        $images = $productsImages->images;

        return view('shop-single', compact('products', 'sizes', 'images'));
    }
}
