<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function page()
    {
        return view('page');
    }

    public function katalog()
    {
        return view('katalog');
    }

    public function promo()
    {
        return view('promo');
    }
}
