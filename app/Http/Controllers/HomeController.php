<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\CoinapultContract;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * @param CoinapultContract $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function index(CoinapultContract $client)
    {
        $API = array(
            'key' => 'e45b1d2337017631ad6dd95ff4e875',
            'secret' => '88fdedcc88eacf644714adf84176231d0c9eaf381c420d648850a1eedc04'
        );
        $client->setData($API['key'], $API['secret']);

        $result = $client->account_info();
        return dd($result);

        return view('home');
    }
}
