<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = "AVuofnixX4Lk6JpyecCndKdMtg_eNsm_stcnHbDtrdE0eKRLi95uZ8WZP9IXi2XYsvKMWXFLpTnHeRHD";
        $clientSecret = "EIwo7yrYlcXaVKRaV1_am8rw6A72iAYiRvd8uTK22W9ZmBygG0-NNhQh3E1as58ms8yMMudSsnC--HCD";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
