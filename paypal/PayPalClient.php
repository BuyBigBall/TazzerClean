<?php

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PaypalClient
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }
    
    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * ProductionEnvironment.
     */
    public static function environment()
    {
        $paypalKeys = paypalKeys();
        $clientId = getenv("CLIENT_ID") ?: $paypalKeys['client_id'];
        $clientSecret = getenv("CLIENT_SECRET") ?: $paypalKeys['secret'];
        if ($paypalKeys['gateway_type'] == "sandbox") {
            return new SandboxEnvironment($clientId, $clientSecret);
        }
        return new ProductionEnvironment($clientId, $clientSecret);
    }
}
