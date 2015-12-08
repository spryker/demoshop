<?php

/**
 * Notes:
 *
 * - jobs[]['name'] must not contains spaces or any other characters, that have to be urlencode()'d
 * -jobs[]['role'] default value is 'admin'
 *
 * @todo use values from config/stores.php
 */

$allStores = ['DE'];

/* -- MAIL QUEUE -- */
$jobs[] = [
    'name' => 'send-mails',
    'command' => '$PHP_BIN vendor/bin/console mailqueue:registration:send',
    'schedule' => '*/10 * * * *',
    'enable' => false,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

/* STATE MACHINE */
$jobs[] = [
    'name' => 'check-statemachine-conditions',
    'command' => '$PHP_BIN vendor/bin/console oms:check-condition',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'check-statemachine-timeouts',
    'command' => '$PHP_BIN vendor/bin/console oms:check-timeout',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'export-kv',
    'command' => '$PHP_BIN vendor/bin/console collector:storage:export',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'export-search',
    'command' => '$PHP_BIN vendor/bin/console collector:search:export',
    'schedule' => '*/10 * * * *',
    'enable' => false,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'update-search',
    'command' => '$PHP_BIN vendor/bin/console collector:search:update',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];
