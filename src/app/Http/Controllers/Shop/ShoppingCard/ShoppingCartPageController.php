<?php

namespace App\Http\Controllers\Shop\ShoppingCard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartPageController extends Controller
{
    public function index()
    {

    }

    public function itemDelete($name, Request $request)
    {
        $session = session();
        $getAllWithSession = $session->get('orders');

        foreach ($getAllWithSession as $key => $value) {

            if ($value['name'] == $name) {
                unset($getAllWithSession[$key]);
                // получить идентификатор куки orders
                $valueCookieOrders = request()->cookie('orders');
                // обновить данные redis добавив товар в корзину
                $updateDataWithSession = json_encode($getAllWithSession);

                session()->flush();
                Redis::set($valueCookieOrders, $updateDataWithSession);
                return back();
            } else {
//                return back();
            }
        }

//        dd($getAllWithSession);


//        foreach ($getAllWithSession as $item)
//        {
//            print_r($item);
//            echo '<br>';
//            echo $item['name'];
//            echo '<br>';
//
//            if ($item['name'] == $name) {
//                echo '<br>';
//                echo 'ok';
//                echo '<br>';
//            }
//
//        }

    }


}
