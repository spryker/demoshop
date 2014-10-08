<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a testing environment.
 */

use ProjectA\Shared\System\SystemConfig;

$config['zed'] = array(
    'ssl_enabled' => true
);

$config['yves']['ssl_enabled'] = true;

$config['lumberjack']['elasticsearch']['host'] = 'localhost';

$config['host'] = [
    'static_assets' => 'www-testing.project-yz.com',
    'static_media'  => 'www-testing.project-yz.com',
    'yves'          => 'www-testing.project-yz.com',
    'zed_gui'       => 'zed-testing.project-yz.com',
    'zed_api'       => 'zed-testing.project-yz.com',

];

$config['host_ssl'] = [
    'static_assets' => 'www-testing.project-yz.com',
    'static_media'  => 'www-testing.project-yz.com',
    'yves'          => 'www-testing.project-yz.com',
    'zed_gui'       => 'zed-testing.project-yz.com',
    'zed_api'       => 'zed-testing.project-yz.com',
];

$config[SystemConfig::ZED_LOG_PROPEL_SQL] = false;