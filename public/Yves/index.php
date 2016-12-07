<?php

use Pyz\Yves\Application\YvesBootstrap;
use Spryker\Shared\Library\Application\Environment;

if (@extension_loaded('newrelic')) {
    @newrelic_start_transaction('demoshop-yves', getenv('NEW_RELIC_LICENSE_KEY');

    if (isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {
        @$page = current(explode('?', $_SERVER['REQUEST_URI']));
    } else {
        @$page = $_SERVER['SCRIPT_FILENAME'];
    }
    @newrelic_name_transaction($page);
}

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

include APPLICATION_ROOT_DIR . '/c3.php';
require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
