<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexMainPageController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
