<?php

/**
 * <workaround>
 * If an exception is thrown during soap request handling (like in
 * fulfillment/tracking/sba), Zend Framework doesn't reset the entity loader. This
 * loader setting somehow survives over the end of the php request and is still not
 * reset when the next request comes in. Therefore I reset the loader here, enabling
 * the loading of xml files again. Otherwise Generated_Yves_Zed would die when trying to load a
 * nagivation.xml file, since setting libxml_disable_entity_loader to "true" effectively
 * disables simplexml_load_file
 *
 * See http://zend-framework-community.634137.n4.nabble.com/Zend-Framework-1-12-0RC3-Released-td4656000.html
 * for details, why these calls got included in the first place (see also Zend_Soap_Server
 * in line 732)
 *
 * see also https://bugs.php.net/bug.php?id=62577
 */
libxml_disable_entity_loader(false);
/**
 * </workaround>
 */

$getEnv = getenv('APPLICATION_ENV');
if (empty($getEnv)) {
    echo 'NO APPLICATION_ENV SET!' . PHP_EOL;
    echo ' use: APPLICATION_ENV=staging php index.php [...]' . PHP_EOL;
    die();
}

$includePath = __DIR__ . '/../src/Pyz/Zed/Application/include.php';
if (!file_exists($includePath)) {
    $includePath = __DIR__ . '/../vendor/project-a/infrastructure-package/src/ProjectA/Zed/Application/include.php';
}
require_once $includePath;

define('IS_ACL_DISABLED', true);
define('IS_CLI', true);

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    dirname(__DIR__) . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, ['config', 'Zed', 'application.ini'])
);

$application->bootstrap();

// We set this to false this so we get an error rate in new relic
\ProjectA_Shared_Library_NewRelic_Api::getInstance()->markAsBackgroundJob(false);

Zend_Controller_Front::getInstance()
    ->setRouter( new \ProjectA_Zed_Library_Controller_Router_Cli() )
    ->setRequest( new \ProjectA_Zed_Library_Controller_Request_Cli() )
    ->setResponse( new \ProjectA_Zed_Library_Controller_Response_Cli() )
    ->setParam('disableOutputBuffering', 1);

$application->run();
