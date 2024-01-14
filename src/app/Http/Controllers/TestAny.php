<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestAny extends Controller
{
    public function index()
    {
        $keys = Redis::keys('*');

        foreach ($keys as $key) {
            $substring = substr($key, strpos($key, '_p') + 1);
            $value = Redis::get($substring);

            if ($value == '[]' or empty($value))
            {
                Redis::del($substring);
                echo 'empty key del' . '<br>';
            } else {
                echo 'No found empty key' . '<br>';
            }

        }

    }
}
