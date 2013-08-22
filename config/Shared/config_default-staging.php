<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */

$config['yves'] = array(
    'tracking' => true,
    'livechat' => false,
);

$config['zed']['customercare']['zed_backlink'] = 'zed-staging.saatchionline.com';

// Legacy-settings for http://www.dev.saatchionline.com/
$config['url'] = array(
    'legacy' => 'www.dev.saatchionline.com'
);

$config['legacy'] = array(
    'http'     => array(
        'ssl'       => true,
        'verifySsl' => false,
        'session'   => array(
            'name'   => 'saatchiscdevelopment',
            'domain' => 'www.dev.saatchionline.com'
        ),
        'auth'      => array(
            'username' => 'projecta',
            'password' => 'mate20mg'
        ),
    ),
    'memcache' => array(
        'host'   => 'dev-sessions-01.use1.isaatchi.com',
        'port'   => '11211',
        'prefix' => ''
    )
);

$config['yves']['session']['name'] = $config['legacy']['http']['session']['name'];
$config['yves']['session']['domain'] = $config['legacy']['http']['session']['domain'];

$config['aws']['sns'] = array(
    'topics' => array(
        'payout'             => array('key' => 'staging-order-item-complete'),
        'new_order'          => array('key' => 'new-order', 'zone' => 'us-west-1'),
        'order-item-fulfill' => array(),
    ),
    'zone'   => 'us-east-1'
);
