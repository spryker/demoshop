<?php

/**
jobs[]['name'] must not contains spaces or any other characters, that have to be urlencode()'d
jobs[]['role'] default value is 'admin'

@author Marek Obuchowicz
@author Michael Kugele
 */

/**
 * @todo use values from config/stores.php
 */
$allStores = array('DE');

/* STATE MACHINE */
$jobs[] = [
    'name'     => 'check-statemachine-conditions',
    'command'  => '$PHP_BIN vendor/bin/pav-console oms:check-condition',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'check-statemachine-timeouts',
    'command'  => '$PHP_BIN vendor/bin/pav-console oms:check-timeout',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
];

/* EXPORTER */
$jobs[] = [
    'name'     => 'export-kv',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:storage:export',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'export-search',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:search:export',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'update-search',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:search:update',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
];

