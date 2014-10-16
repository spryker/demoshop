<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = 'mysql';
$config[SystemConfig::ZED_SESSION_SAVE_PATH] = 'shared-data:mate20mg@localhost:3306';

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = 'mysql';
$config[YvesConfig::YVES_SESSION_SAVE_PATH] = 'shared-data:mate20mg@localhost:3306';

