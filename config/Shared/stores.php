<?php
$stores = [];

$stores['DE'] = [
    'contexts' => [ // different contexts
        // shared settings for all contexts
        '*' => [
            'timezone' => 'Europe/Berlin',
            'dateFormat' => [
                'short' => 'd/m/Y', // short date (01.02.12)
                'medium' => 'd. M Y', // medium Date (01. Feb 2012)
                'rfc' => 'r', // date formatted as described in RFC 2822
                'datetime' => 'Y-m-d H:i:s',
            ],
        ],
        // settings for contexts (overwrite shared)
        'yves' => [],
        'zed' => [
            'dateFormat' => [
                'short' => 'Y-m-d', // short date (2012-12-28)
            ],
        ],
    ],
    'locales' => ['de_DE', 'ru_RU', 'en_US'],   // first entry is default
    'countries' => ['DE'],   // first entry is default
    'currencyIsoCode' => 'EUR', // internal and shop
];
/*
$stores['US'] = [
    'contexts' => [ // different contexts
        // shared settings for all contexts
        '*' => [
            'timezone' => 'America/Los_Angeles',
            'dateFormat' => [
                'short' => 'd/m/Y', // short date (01.02.12)
                'medium' => 'd. M Y', // medium Date (01. Feb 2012)
                'rfc' => 'r', // date formatted as described in RFC 2822
                'datetime' => 'Y-m-d H:i:s',
            ],
        ],
        // settings for contexts (overwrite shared)
        'yves' => [],
        'zed' => [
            'dateFormat' => [
                'short' => 'Y-m-d', // short date (2012-12-28)
            ],
        ],
    ],
    'locales' => ['en_US'],   // first entry is default
    'countries' => ['US'],   // first entry is default
    'currencyIsoCode' => 'USD', // internal and shop
];*/

return $stores;
