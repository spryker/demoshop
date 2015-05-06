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

/* -- MAIL QUEUE -- */
$jobs[] = [
    'name'     => 'send-mails',
    'command'  => '$PHP_BIN vendor/bin/console mail:send-mail',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $allStores,
];

/* STATE MACHINE */
$jobs[] = [
    'name'     => 'check-statemachine-conditions',
    'command'  => '$PHP_BIN vendor/bin/console oms:check-condition',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'check-statemachine-timeouts',
    'command'  => '$PHP_BIN vendor/bin/console oms:check-timeout',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'export-kv',
    'command'  => '$PHP_BIN vendor/bin/console frontend:exporter:export-key-value',
    'schedule' => '*/10 * * * *',
    'enable'   => false,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'export-search',
    'command'  => '$PHP_BIN vendor/bin/console frontend:exporter:export-search',
    'schedule' => '*/10 * * * *',
    'enable'   => false,
    'stores'   => $allStores,
];

$jobs[] = [
    'name'     => 'update-search',
    'command'  => '$PHP_BIN vendor/bin/console frontend:exporter:update-search',
    'schedule' => '*/10 * * * *',
    'enable'   => false,
    'stores'   => $allStores,
];

