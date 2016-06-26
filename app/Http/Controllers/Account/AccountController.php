<?php

namespace App\Http\Controllers\Account;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\GenerateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Helpers\CoinapultContract;
use App\Helpers\ExchangeApiContract;

use Validator;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('account.index');
    }

    /**
     * @param GenerateRequest $request
     * @param CoinapultContract $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function generate(GenerateRequest $request, CoinapultContract $client, ExchangeApiContract $course) {

        $client->setData(config('app.api_key'), config('app.api_secret'));

        $public_address = $client->get_bitcoin_address();

        $user = Auth::user();

        $dollars = $request->input('price') / 20000;
        $btc_amount = $course->transUSDtoBTC($dollars);

        $transaction = new Transaction([
            'public_address' => $public_address['address'],
            'phone' => $request->input('phone'),
            'btc_amount' => $btc_amount,
            'bel_amount' => $request->input('price'),
        ]);

        $user->transaction()->save($transaction);

        return view('account.pay')->with([
            'public_address' => $public_address['address'],
            'amount_btc' => $btc_amount,
            'amount_bel' => $request->input('price'),
        ]);
    }

    public function check() {
        return 1;
    }
}
