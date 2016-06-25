<?php

namespace App\Helpers;

Interface ExchangeApiContract
{
    public function transUSDtoBTC($dollars = 1);
}