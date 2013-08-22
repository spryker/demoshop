<?php
/**
 * !!! This file is maintained by puppet. Do not modify this file, as the changes will be overwritten!
 *
 */

$config['db'] = array(
    'username' => 'root',
    'password' => 'root',
    'database' => 'newtree-de',
    'host' => '10.10.0.34',
);

$config['yves'] = array(
    'https_enabled' => false,
    'session' => array(
        'save_handler' => '',
        'save_path' => '',
    ),
    'theme' => 'en_US',
    'currency' => 'FIX',
    'baseTheme' => 'sao',
    'country' => 'Deutschland',
);

$config['zed'] = array(
    'session' => $config['yves']['session']
);

$config['lumberjack'] = array(
    'enabled' => false,
    'destination' => '/queue/lumberjack',
    'properties'  => array(
        'persistent' => 'true',
    ),
    'prefetch_size' => 500,
    'amount_of_frames' => 500,
    'amount_of_buckets' => 20,
    'url' => '/lumberjack/elastic-search-proxy/',
    'mapping' => 'mapping',
    'search' => 'search',
    'proxy' => true,
    'username' => null,
    'password' => null,
    'timeout_seconds' => 30,
    'timeout_milliseconds' => 0,
    'elasticsearch' => array(
        'host' => 'projecta:mate20mg@127.0.0.1:9200/',
        'port' => 'FIXME',
        'protocol' => 'http',
        'index' => 'na-saatchi-dev',
        'type' => 'logs',
        'username' => 'projecta',
        'password' => 'mate20mg',
        'multi_store_index' => false,
    ),
);
