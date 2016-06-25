<?php

namespace app\Helpers;

use App\Helpers\ExchangeApiContract;
use GuzzleHttp\Client;

class ExchangeApiController implements ExchangeApiContract
{
    private function getCourse() {
        $client = new Client();
        $request = $client->request('GET', 'https://btc-e.com/api/3/ticker/btc_usd');

        $result = json_decode($request->getBody());

        return $result->btc_usd->last;
    }

    public function transUSDtoBTC($dollars = 1) {
        $one_btc = $this->getCourse();

        return  $dollars / $one_btc;
    }
}
