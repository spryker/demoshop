<?php
/* YVES Front Controller */

use SprykerFeature\Shared\Library\Application\Environment;
use Pyz\Yves\Application\Communication\YvesBootstrap;

define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/library/src/SprykerFeature/Shared/Library/Application/Environment.php');

Environment::initialize('Yves');

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
