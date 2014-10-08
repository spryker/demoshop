<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use ProjectA\Shared\System\SystemConfig;

$config['zed']['ssl_enabled'] = false;

$config['yves']['ssl_enabled'] = false;

$config[SystemConfig::ZED_MYSQL][SystemConfig::ZED_MYSQL__USERNAME] = 'development';
$config[SystemConfig::ZED_MYSQL][SystemConfig::ZED_MYSQL__PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_MYSQL][SystemConfig::ZED_MYSQL__DATABASE] = 'DE_development_zed';
$config[SystemConfig::ZED_MYSQL][SystemConfig::ZED_MYSQL__HOST] = 'localhost';
$config[SystemConfig::ZED_MYSQL][SystemConfig::ZED_MYSQL__PORT] = 3306;


$config['storage']['kv']['couchbase']['user'] = '';
$config['storage']['kv']['couchbase']['password'] = 'mate33mgj';

$config['storage']['couchbase']['user'] = '';
$config['storage']['couchbase']['password'] = 'mate33mgj';

/** Session storage */
$config['zed']['session']['save_handler'] = 'mysql';
$config['zed']['session']['save_path'] = 'shared-data:mate20mg@localhost:3306';

$config['yves']['session']['save_handler'] = 'mysql';
$config['yves']['session']['save_path'] = 'shared-data:mate20mg@localhost:3306';


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
    'data_dir' => APPLICATION_ROOT_DIR . '/data/jenkins', //PalShared_Data::getLocalCommonPath('jenkins'),
);

$config['mailcatcher'] = [
    'gui' => 'http://zed-development.project-yz.com:1080/'
];

$config['cloud']['enabled'] = false;
$config['cloud']['objectStorage']['enabled'] = false;
$config['cloud']['cdn']['enabled'] = false;
