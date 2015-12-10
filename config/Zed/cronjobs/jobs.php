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
    'schedule' => '*/5 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'joerg.stick@project-a.com', 'server-alert@petsdeli.de']
];

$jobs[] = [
    'name'     => 'check-statemachine-timeouts',
    'command'  => '$PHP_BIN vendor/bin/pav-console oms:check-timeout',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'joerg.stick@project-a.com', 'server-alert@petsdeli.de']
];

/* EXPORTER */
$jobs[] = [
    'name'     => 'export-kv',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:storage:export',
    'schedule' => '* * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'server-alert@petsdeli.de']
];

$jobs[] = [
    'name'     => 'export-search',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:search:export',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'server-alert@petsdeli.de']
];

$jobs[] = [
    'name'     => 'update-search',
    'command'  => '$PHP_BIN vendor/bin/pav-console collector:search:update',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'server-alert@petsdeli.de']
];

/* -- MAILCHIMP SYNCHRONIZATION -- */
$jobs[] = [
    'name'     => 'mailchimp-synchronization',
    'command'  => '$PHP_BIN vendor/bin/pav-console mailchimp:synchronize',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'server-alert@petsdeli.de']
];

$jobs[] = [
    'name'     => 'product-feed-generation',
    'command'  => '$PHP_BIN vendor/bin/pav-console product-feed:generate',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'run_on_non_production' => true,
    'stores'   => $allStores,
    'notifications' => ['stephan.schulze@project-a.com', 'server-alert@petsdeli.de']
];

