<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Helpers\ExchangeApiContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @param ExchangeApiContract $api
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ExchangeApiContract $api)
    {
        $dollars = 100000 / 20000;
        return $api->transUSDtoBTC($dollars);

        return view('home');
    }
}
