<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

$config['url']['legacy'] = 'www.dev.saatchionline.com';

$config['yves'] = array(
    'tracking' => false,
    'livechat' => false,
);

$config['zed'] = array(
    'ssl_enabled' => false,
);

$config['legacy'] = array(
    'http'     => array(
        'ssl'       => false,
        'verifySsl' => false,
        'session'   => array(
            'name'   => 'saatchisclocal',
            'domain' => 'www.local.saatchionline.com',
        ),
        'auth'      => array(
            'username' => '',
            'password' => '',
        ),
    )
);

$config['yves']['session']['name'] = $config['legacy']['http']['session']['name'];
// $config['yves']['session']['domain'] = $config['legacy']['http']['session']['domain'];

$config['aws']['sns'] = array(
    'topics' => array(
        'payout'             => array('key' => 'dev-order-item-complete'),
        'new_order'          => array('key' => 'new-order', 'zone' => 'us-west-1'),
        'order-item-fulfill' => array(),
    ),
    'zone'   => 'us-east-1'
);
