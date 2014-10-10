<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */


use ProjectA\Shared\System\SystemConfig;

$config['cloud']['enabled'] = true;
$config['cloud']['objectStorage']['enabled'] = true;
$config['cloud']['cdn']['enabled'] = true;

$config[SystemConfig::LOG_PROPEL_SQL] = false;