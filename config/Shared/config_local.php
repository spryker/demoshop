<?php
/**
 * !!! This file is maintained by puppet. Do not modify this file, as the changes will be overwritten!
 *
 */

$config['salt'] = 'k4ffCsL';

$config['solr']['base_url'] = 'http://localhost:10007/solr';
$config['solr']['data_dir'] = '/data/shop/development/shared/data/common/solr';

$config['jenkins'] = array(
    'base_url' => 'http://localhost:10007/jenkins',
    'notify_email' => '',
);

$config['log'] = array( 'log_propel_sql' => false );

/**
 * @deprecated
 */
$config['transfer'] = array(
    'timeout_yves_to_zed_connection' => 30,
    'timeout_yves_to_zed_request' => 30,
    'transfer_log' => false
);

/**
 * @deprecated
 */
$config['timeout'] = array(
    'yves_to_zed_connection' => 30,
    'yves_to_zed_request' => 30,

);


$config['activemq'] = array (
  array('host' => 'localhost', 'port' => '30006'), 
  
); 

$config['yves']['tracking'] = true;
