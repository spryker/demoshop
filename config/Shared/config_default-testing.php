<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a testing environment.
 */
$config['yves'] = array(
    'tracking' => false,
    'livechat' => false,
);

$config['zed'] = array(
    'ssl_enabled' => false
);

// Legacy-settings for http://www.dev.saatchionline.com/
$config['url'] = array(
    'legacy' => 'www.qa.saatchionline.com'
);

$config['legacy'] = array(
    'http'     => array(
        'ssl'       => true,
        'verifySsl' => false,
        'session'   => array(
            'name'   => 'saatchiscqa',
            'domain' => 'www.qa.saatchionline.com'
        ),
        'auth'      => array(
            'username' => 'projecta',
            'password' => 'mate20mg'
        ),
    ),
    'memcache' => array(
        'host'   => 'qa.7w2vrh.cfg.use1.cache.amazonaws.com',
        'port'   => '11211',
        'prefix' => ''
    )
);
$config['yves']['session']['name'] = $config['legacy']['http']['session']['name'];
$config['yves']['session']['domain'] = $config['legacy']['http']['session']['domain'];

// Fakeorder
$config['mail'] = array(
    'defaultReplyEmail' => 'monika.depka@project-a.com',
    'viewOrderUrl' => 'http://www.qa.saatchionline.com/accounts/orders',
    'availabilityCheckUrl' => 'http://www.qa.saatchionline.com/artworkavailability',
    /**
     * fakeOrderData used in "GetUserInformation from Legacy" Command
     */
    'overrideOrderData' => array(
        'email' => 'monika.depka@project-a.com',
        'firstname' => 'Monika',
        'lastname' => 'Depka'
    )
);

$config['aws']['sns'] = array(
    'topics' => array(
        'payout'             => array('key' => 'qa-order-item-complete'),
        'new_order'          => array('key' => 'new-order', 'zone' => 'us-west-1'),
        'order-item-fulfill' => array(),
    ),
    'zone'   => 'us-east-1'
);
