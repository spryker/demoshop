<?php
/* YVES Front Controller */

use SprykerFeature\Shared\Library\Application\Environment;
use Pyz\Yves\Application\Communication\YvesBootstrap;


define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles/Library/src/SprykerFeature/Shared/Library/Application/Environment.php');

if (!file_exists(APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . '.class_map')) {
    echo 'Can\'t find a class map file. Please run $ vendor/bin/class-map-builder to create a class map.';exit;
}

Environment::initialize('Yves');

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
