<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CookieToSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Проверяем наличие ключа редис в куки, если есть, берем с редиса и кладем в сессию
        if ($request->hasCookie('orders')) {

            // Получаем значение куки
            $decryptedValueCookie = Crypt::decrypt(Cookie::get('orders'), false);
            $parts = explode('|', $decryptedValueCookie);
            // Выбираем вторую часть после "|", если она существует
            $valueCookie = isset($parts[1]) ? $parts[1] : '';
            //Выбираем данные из redis
            if ($valueCookie) {
                $redisKey = $valueCookie; // Замените 'your_prefix' на нужный вам префикс
                $redisData = json_decode(Redis::get($redisKey), true);

                if ($redisData !== null) {
                    $session = session();
                    $session->put('orders', $redisData);
                } else {
                    // Данные по этому ключу отсутствуют в Redis
                    return $next($request);
                }
            } else {
                // Кука не найдена, обработайте этот случай по усмотрению
                return $next($request);
            }

            // Сохраняем значение в сессии
//            Session::put('orders', $cookieValue);
        }

        return $next($request);

    }
}
