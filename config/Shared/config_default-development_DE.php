<?php

//$config['storage'] = [
//    'kv' => [
//        //define the current used source and provide a setup
//        'source' => 'mysql',
//        'couchbase' => [
//            'hosts' => [
//                [
//                    'host' => '0.0.0.0',
//                    'port' => '8091'
//                ],
//            ],
//            'user' => '',
//            'password' => '',
//            'bucket' => '',
//            'timeout' => 100000,
//        ],
//        'memcached' => [
//            'host' => 'localhost',
//            'port' => '11211',
//            'prefix' => ''
//        ],
//        'mysql' => [
//            'host' => 'localhost',
//            'user' => 'shared-data',
//            'password' => 'mate20mg',
//            'database' => 'shared_data',
//            'port' => 3306,
//            'table' => 'development_kv'
//        ]
//    ],
//];

$config['host'] = [
    'static_assets' => 'www-development.project-yz.de',
    'static_media' => 'www-development.project-yz.de',
    'yves' => 'www-development.project-yz.de',
    'zed_gui' => 'zed-development.project-yz.de',
    'zed_api' => 'zed-development.project-yz.de',
];

$config['host_ssl'] = [
    'static_assets' => 'www-development.project-yz.de',
    'static_media' => 'www-development.project-yz.de',
    'yves' => 'www-development.project-yz.de',
    'zed_gui' => 'zed-development.project-yz.de',
    'zed_api' => 'zed-development.project-yz.de',
];

$config['cloud']['cdn']['static_media']['http'] = 'http://static-development.project-yz.de';
$config['cloud']['cdn']['static_media']['https'] = 'https://static-development.project-yz.de';
