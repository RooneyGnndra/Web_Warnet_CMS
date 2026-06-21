<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    public function home()
    {
        return view('CMS.Main.home');
    }
    public function page()
    {
        return view('CMS.Main.page');
    }

    public function katalog()
    {
        return view('CMS.Main.katalog');
    }

    public function promo()
    {
        return view('CMS.Main.promo');
    }
}
