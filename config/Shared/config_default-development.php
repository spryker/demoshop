<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

$config['zed'] = [
    'ssl_enabled' => false,
];

$config['yves'] = [
    'ssl_enabled' => false,
];

$config['db'] = [
    'username' => 'development',
    'password' => 'mate20mg',
    'database' => 'DE_development_zed',
    'host' => 'localhost',
    'port' => 3306
];

$config['lumberjack']['elasticsearch']['host'] = 'localhost';

$config['storage']['kv']['couchbase']['hosts'] = [
    [
        'host' => 'localhost',
        'port' => '8091',
    ]
];

$config['storage']['solr']['endpointGroups'] = [
    'stores' => [
        'DE',
    ],
];

$config['storage']['solr']['endpoint'] = [
    'DE' => [
        'core' => 'DE'
    ],
];

$config['storage']['kv']['couchbase']['user'] = '';
$config['storage']['kv']['couchbase']['password'] = 'mate33mgj';

$config['storage']['couchbase']['user'] = '';
$config['storage']['couchbase']['password'] = 'mate33mgj';

$config['zed']['session']['save_handler'] = 'couchbase';
$config['zed']['session']['save_path'] = ':mate33mgj@localhost:8091';

$config['yves']['session']['save_handler'] = 'couchbase';
$config['yves']['session'] = $config['zed']['session'];

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

$config['kibana'] = [
    'base_url' => 'http://' . $config['host']['zed_gui'] .':9292',
];

$config['jenkins'] = array(
    'base_url' => 'http://zed-development.project-yz.com:10007/jenkins',
    'notify_email' => '',
    // TODO: change to NEW?  PalShared_Data::getLocalCommonPath('jenkins'),
    'data_dir' => APPLICATION_ROOT_DIR . '/data/jenkins', //PalShared_Data::getLocalCommonPath('jenkins'),
);

$config['mailcatcher'] = [
    'gui' => 'http://zed-development.project-yz.com:1080/'
];

$config['cloud']['enabled'] = false;
$config['cloud']['objectStorage']['enabled'] = false;
$config['cloud']['cdn']['enabled'] = false;
