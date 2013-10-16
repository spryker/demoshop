<?php
/**
jobs[]['name'] must not contains spaces or any other characters, that have to be urlencode()'d
jobs[]['role'] default value is 'admin'

@author Marek Obuchowicz
@author Michael Kugele
 */

$all_stores = array('US'); // Todo: use value from config/stores.php

/* -- MAIL QUEUE -- */
$jobs[] = array(
    'name'     => 'send_queued_mails',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=mail --controller=cronjob --action=send-queued-mails',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

/* -- DUMP DB -- */
//$jobs[] = array(
//    'name'     => 'generate_database_dump',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=dbdump --controller=cronjob --action=execute',
//    'schedule' => '0 7 * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);

/* STATE MACHINE */
$jobs[] = array(
    'name'     => 'check_statemachine_conditions_and_timeouts',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-transitions',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'check_statemachine_timeouts_daily',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-daily-timeout',
    'schedule' => '0 1 * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'check_statemachine_timeouts_weekly',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-weekly-timeout',
    'schedule' => '0 1 * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'check_statemachine_timeouts_monthly',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-monthly-timeout',
    'schedule' => '0 1 * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

//
//$jobs[] = array(
//    'name'     => 'dwh_import',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=dwh --controller=cronjob --action=run-import',
//    'schedule' => '01 * * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//    'role'     => 'reporting',
//    'notifications' => array('saatchidwh@squad.cc'),
//);

//$jobs[] = array(
//    'name'          => 'download_mail_chimp_data',
//    'command'       => '$PHP_BIN $CLI_PATH/index.php --module=em --controller=cronjob --action=download-mail-chimp-data',
//    'schedule'      => '42 3 * * *',
//    'enable'        => true,
//    'stores'        => $all_stores,
//    'notifications' => array('saatchidwh@squad.cc'),
//    'role'          => 'reporting',
//);

/* LUMBERJACK */
$jobs[] = array(
    'name'     => 'push_lumberjack_messages_from_queue_to_elastic_search',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=lumberjack --controller=cronjob --action=push-messages-to-elastic-search',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

///* -- Cart Abandoned -- */
//$jobs[] = array(
//    'name'     => 'send_cart_abandoned_mails',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=mail --controller=cronjob --action=send-cart-abandoned-mails',
//    'schedule' => '*/10 * * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);

$jobs[] = array(
    'name'     => 'import_product_images',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=product-image --controller=cronjob --action=import-incoming-images',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'download_product_images_from_s3',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=product-image --controller=cronjob --action=download-product-images-from-s3',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);
