<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopShowController extends Controller
{
    public function index(Request $request)
    {

        if (empty($request->query())) {
            abort(404);
        } else {

            //            dd($products->count() > 0); // проверка на не пустой ли $products

            $filter = current($request->query());
            switch ($filter) {
                case 'all':
                    $products = Product::paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'shirt':
                    $products = Product::where('type', 'Футболка')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'suit':
                    $products = Product::where('type', 'Костюм')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'trousers':
                    $products = Product::where('type', 'Штаны')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
            }
        }
    }

    public function men(Request $request)
    {
        if (empty($request->query())) {
            abort(404);
        } else {
            $filter = current($request->query());
            switch ($filter) {
                case 'all':
                    $products = Product::where('category', 'Мужская')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'shirt':
                    $products = Product::where('category', 'Мужская')
                        ->where('type', 'Футболка')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'suit':
                    $products = Product::where('category', 'Мужская')
                        ->where('type', 'Костюм')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'trousers':
                    $products = Product::where('category', 'Мужская')
                        ->where('type', 'Штаны')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
            }
        }

    }

    public function women(Request $request)
    {
        if (empty($request->query())) {
            abort(404);
        } else {
            $filter = current($request->query());
            switch ($filter) {
                case 'all':
                    $products = Product::where('category', 'Женская')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'shirt':
                    $products = Product::where('category', 'Женская')
                        ->where('type', 'Футболка')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'suit':
                    $products = Product::where('category', 'Женская')
                        ->where('type', 'Костюм')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'trousers':
                    $products = Product::where('category', 'Женская')
                        ->where('type', 'Штаны')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
            }
        }
    }

    public function children(Request $request)
    {
        if (empty($request->query())) {
            abort(404);
        } else {
            $filter = current($request->query());
            switch ($filter) {
                case 'all':
                    $products = Product::where('category', 'Детская')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'shirt':
                    $products = Product::where('category', 'Детская')
                        ->where('type', 'Футболка')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'suit':
                    $products = Product::where('category', 'Детская')
                        ->where('type', 'Костюм')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                case 'trousers':
                    $products = Product::where('category', 'Детская')
                        ->where('type', 'Штаны')
                        ->paginate(9);

                    return view('shop', compact('products'));
                    break;
                default:
                    abort(404);
                    break;
            }
        }
    }
}
