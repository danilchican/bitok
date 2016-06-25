<?php

namespace App\Helpers;

Interface CoinapultContract
{
    public function gen_nonce($length=22);
    public function authenticate_callback($recv_key, $recv_hmac, $recv_data);
    public function setData($key, $secret);
    public function ticker();
    public function account_info();
    public function get_bitcoin_address();
    public function send($amount, $address, $currency='BTC', $extOID=NULL, $callback=NULL);
    public function receive($amount, $inCurrency='BTC', $outAmount=NULL,
                            $outCurrency=NULL, $extOID=NULL, $callback=NULL, $address=NULL);
    public function search($criteria, $many=false, $page=NULL);
    public function convert($amount, $inCurrency='BTC', $outCurrency=NULL, $callback=NULL);
}