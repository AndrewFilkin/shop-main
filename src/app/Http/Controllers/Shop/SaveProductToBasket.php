<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class SaveProductToBasket extends Controller
{
    public function saveProductToBasket(Request $request)
    {

        //        $mas = ['qwer', 'asdf', 'zxcv'];
        //        $mas2 = ['qwer2', 'asdf2', 'zxcv2'];
        //
        //        $session = session();
        //        $session->put('orders', ['product' . mt_rand() => $request->all(), 'product' . mt_rand() => $mas]);
        //
        //        //добавляем новый массив в массив с сессии
        //        $allData = $session->get('orders');
        //        $allData['product' . mt_rand()] = $mas2;
        ////      кладем массив с добавленным массивом в сессию
        //        $session->put('orders', $allData);
        //        // получаем данные из сессии
        //        $allData = $session->get('orders');
        //        dd($allData);

        //положить куки
        //        $cookie = cookie('product', json_encode($request->all()), 5);
        //        return response('Hello World')->cookie($cookie);
        //получить куки
        //        $value = json_decode(request()->cookie('product'), true);
        //        dd($value);

        //        $data = Redis::set('Name', 'Andrew');
        //        $data = Redis::set('Fname', 'Filkin');
        ////        Redis::flushall(); //удалить все
        //        $name = Redis::get('Name');
        //        dd($name);


//        $cookieValue = $request->cookie('orders');
//            // Сохраняем значение в сессии
//            dd($cookieValue);

        $session = session();
        if ($request->session()->has('orders')) {

            // добавляем в сесию (корзину) еще один товар
            $getAllDataWithSession = $session->get('orders');
            $getAllDataWithSession['product' . mt_rand()] = $request->all();
            $session->put('orders', $getAllDataWithSession);

            // получить идентификатор куки orders
            $valueCookieOrders = request()->cookie('orders');
            // обновить данные redis добавив товар в корзину
            $updateDataWithSession = json_encode($getAllDataWithSession);
            Redis::set($valueCookieOrders, $updateDataWithSession);

            return back();

        } else {
            // Сгенерировать рандомный ключь для ключа Redis и cookie
            // Получаем текущую дату и время с использованием Carbon
            $currentDateTime = Carbon::now();
            // Преобразуем текущую дату и время в строку с нужным форматом (например, "YmdHis")
            $timeBasedString = $currentDateTime->format('YmdHis');
            // Генерируем случайную строку заданной длины
            $randomString = Str::random(10); // Здесь 10 - это длина строки
            // Соединяем дату/время и случайную строку, чтобы получить уникальный ключ
            $uniqueKey = $timeBasedString . $randomString;
            // кладем данные в сессию
            $session->put('orders', ['product' . $uniqueKey => $request->all()]);
            // кладем сессию в Redis
            $sessionData = json_encode($session->get('orders'));
            Redis::set('product' . $uniqueKey, $sessionData);
            // кладем идентификатор в куки
            $cookie = cookie('orders', 'product' . $uniqueKey, 525600);

            // получить сессию из redis
            // Чтение из Redis
//            $jsonArray = Redis::get($uniqueKey);
            // Преобразование JSON строки обратно в массив
//            $twoDimensionalArray = json_decode($jsonArray, true);

        }
        // $request->session()->flush(); // удалить все

        return back()->cookie($cookie);
    }
}
