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

$includePath = __DIR__ . '/../../../src/Pyz/Zed/Application/include.php';
if (!file_exists($includePath)) {
    $includePath = realpath(__DIR__ . '/../../../vendor/project-a/infrastructure-package/src/ProjectA/Zed/Application/include.php');
}
require_once $includePath;

//ini_set('display_errors', false);

define('IS_CLI', false);

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_ROOT_DIR . '/config/Zed/application.ini'
);

$application->bootstrap();
$application->run();
