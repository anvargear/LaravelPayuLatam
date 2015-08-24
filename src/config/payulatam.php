<?php

return [
    'theme' => env('PAYU_THEME', 'bootstrap'),
    // Merchant ID
    'merchantId' => env('PAYU_MERCHANT_ID', 'OPU_TEST'),
    // API KEY
    'apiKey' => env("PAYU_API_KEY", "API_KEY"),
    // API LOGIN
    'apiLogin' => env("PAYU_API_LOGIN", "API_LOGIN"),
    // SUPPORTED LANGUAGE ES, EN, PR
    'language' => env("PAYU_LANG", "en"),
    // TEST MODE (False or True)
    'test' => env("PAYU_TEST_MODE", true),
    // CURRENCY
    'currency' => env("PAYU_CURRENCY", 'COP'),
    //RESPONSE URL
    'responseUrl' => env("PAYU_RESPONSE_URL", ''),
    // CONFIRMATION URL
    'confirmationUrl' => env("PAYU_CONFIRMATION_URL", '')
];