<?php

namespace App\Http\Controllers\Account;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\GenerateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Helpers\CoinapultContract;

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
    public function generate(GenerateRequest $request, CoinapultContract $client) {

        $API = array(
            'key' => 'e45b1d2337017631ad6dd95ff4e875',
            'secret' => '88fdedcc88eacf644714adf84176231d0c9eaf381c420d648850a1eedc04'
        );

        $client->setData($API['key'], $API['secret']);

        $result = $client->get_bitcoin_address();

        $user = Auth::user();

        $transaction = new Transaction([
            'public_address' => $result['address'],
            'phone' => $request->input('phone'),
        ]);

        $user->transaction()->save($transaction);

        return view('account.pay')->with([
            'public_address' => $result['address'],
            'amount_btc' => $request->input('price'),
            'amount_bel' => $request->input('price') * 2,
        ]);
    }
}
