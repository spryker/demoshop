<?php

/**
 * Notes:
 *
 * - jobs[]['name'] must not contains spaces or any other characters, that have to be urlencode()'d
 * - jobs[]['role'] default value is 'admin'
 *
 * @TODO Use values from config/stores.php
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
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

/* Oms */
$jobs[] = [
    'name' => 'check-oms-conditions',
    'command' => '$PHP_BIN vendor/bin/console oms:check-condition',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'check-oms-timeouts',
    'command' => '$PHP_BIN vendor/bin/console oms:check-timeout',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'clear-oms-locks',
    'command' => '$PHP_BIN vendor/bin/console oms:clear-locks',
    'schedule' => '0 6 * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'queue-worker-start',
    'command' => '$PHP_BIN vendor/bin/console queue:worker:start -vvv',
    'schedule' => '* * * * *',
    'enable' => false,
    'run_on_non_production' => false,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'product-relation-updater',
    'command' => '$PHP_BIN vendor/bin/console product-relation:update -vvv',
    'schedule' => '30 2 * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

/* StateMachine */
/*
$jobs[] = [
    'name' => 'check-state-machine-conditions',
    'command' => '$PHP_BIN vendor/bin/console state-machine:check-condition',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'check-state-machine-timeouts',
    'command' => '$PHP_BIN vendor/bin/console state-machine:check-timeout',
    'schedule' => '* * * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];

$jobs[] = [
    'name' => 'clear-state-machine-locks',
    'command' => '$PHP_BIN vendor/bin/console state-machine:clear-locks',
    'schedule' => '0 6 * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];
*/

/* ProductLabel */
$jobs[] = [
    'name' => 'check-product-label-validity',
    'command' => '$PHP_BIN vendor/bin/console product-label:validity',
    'schedule' => '0 6 * * *',
    'enable' => true,
    'run_on_non_production' => true,
    'stores' => $allStores,
];
