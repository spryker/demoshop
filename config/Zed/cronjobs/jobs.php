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
$jobs[] = array(
    'name'     => 'generate_database_dump',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=dbdump --controller=cronjob --action=execute',
    'schedule' => '0 7 * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

/* STATE MACHINE */
$jobs[] = array(
    'name'     => 'check_statemachine_conditions_and_timeouts',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-transitions',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'artwork_availability',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=artwork-availability',
    'schedule' => '*/5 * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

$jobs[] = array(
    'name'     => 'check_if_all_items_of_quote_printable',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-if-all-items-of-quote-printable',
    'schedule' => '*/5 * * * *',
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

//$jobs[] = array(
//    'name'     => 'start_fraud_check_process',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=start-fraud-check',
//    'schedule' => '*/10 * * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
//$jobs[] = array(
//    'name'     => 'check_invoice_creation',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=sales --controller=cronjob --action=check-invoice-creation',
//    'schedule' => '*/10 * * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
//
///* -- SITEMAPS GENERATOR -- */
//$jobs[] = array(
//    'name'     => 'generate_sitemaps_xml',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=yves --controller=cronjob --action=generate-full-sitemap',
//    'schedule' => '0 2 * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
//
///* -- Product Images Import and Mapping -- */
//$jobs[] = array(
//    'name'     => 'import_product_images',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=image --controller=cronjob --action=import',
//    'schedule' => '59 0 * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
//$jobs[] = array(
//    'name'     => 'product_images_create_and_map',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=image --controller=cronjob --action=mapping',
//    'schedule' => '59 4 * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
//
///* LUMBERJACK */
//$jobs[] = array(
//    'name'     => 'push_lumberjack_messages_from_queue_to_elastic_search',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=lumberjack --controller=cronjob --action=push-messages-to-elastic-search',
//    'schedule' => '* * * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);
//
///* Deactivate old newsletter subscription coupons */
//$jobs[] = array(
//    'name'     => 'deactivate_old_newsletter_subscription_coupons',
//    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=newsletter --controller=cronjob --action=deactivateoldcoupons',
//    'schedule' => '* 3 * * *',
//    'enable'   => true,
//    'stores'   => $all_stores,
//);


$jobs[] = array(
    'name'     => 'dwh_import',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=dwh --controller=cronjob --action=run-import',
    'schedule' => '01 * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
    'role'     => 'reporting',
    'notifications' => array('saatchidwh@squad.cc'),
);

$jobs[] = array(
    'name'          => 'download_mail_chimp_data',
    'command'       => '$PHP_BIN $CLI_PATH/index.php --module=em --controller=cronjob --action=download-mail-chimp-data',
    'schedule'      => '42 3 * * *',
    'enable'        => true,
    'stores'        => $all_stores,
    'notifications' => array('saatchidwh@squad.cc'),
    'role'          => 'reporting',
);


$jobs[] = array(
    'name'     => 'get_legacy_header',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=yves --controller=cronjob --action=get-legacy-header',
    'schedule' => '26 */4 * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

/* LUMBERJACK */
$jobs[] = array(
    'name'     => 'push_lumberjack_messages_from_queue_to_elastic_search',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=lumberjack --controller=cronjob --action=push-messages-to-elastic-search',
    'schedule' => '* * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);

/* -- Cart Abandoned -- */
$jobs[] = array(
    'name'     => 'send_cart_abandoned_mails',
    'command'  => '$PHP_BIN $CLI_PATH/index.php --module=mail --controller=cronjob --action=send-cart-abandoned-mails',
    'schedule' => '*/10 * * * *',
    'enable'   => true,
    'stores'   => $all_stores,
);
