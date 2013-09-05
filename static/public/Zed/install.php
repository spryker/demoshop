<?php

require_once __DIR__ . '/../../../src/Sao/Zed/Application/include.php';

$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('ProjectA_Zed_Library_');
$autoloader->registerNamespace('ProjectA_Shared_');

$config = new Zend_Config_Ini(APPLICATION_ROOT . '/config/Zed/application.ini', APPLICATION_ENV);
$propelConfig = $config->get('propel');

$list = new ProjectA_Zed_Library_File_Filesystem_List($propelConfig->get('propel_gen_directory'), true);
$buildFile = new ProjectA_Zed_Library_Memory_File('build.properties', '');
$list->add($buildFile);

// include plain-php schemata-config files
require_once APPLICATION_ROOT . '/config/Zed/schemata.php';
if (ProjectA_Shared_Library_Environment::isDevelopment() || ProjectA_Shared_Library_Environment::isCoreDevelopment()) {
    require_once APPLICATION_ROOT . '/config/Zed/schemata-development.php';
}
/* @var $schemata array */

$installer = new ProjectA_Zed_Library_Propel_Install();
$installer->setSchemata($schemata);
$installer->createSchemaXml();
$installer->createDatabase();
$installer->setPropelGenDirectory($propelConfig->get('propel_gen_directory'));

$installer->createConfig();
$propelLog = ProjectA_Zed_Library_Propel_Phing::run(['om', 'convert-conf']);

$lj = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
$lj->addField('log', $propelLog);
$lj->addField('schemata', $schemata);
$lj->addField('buildFile', $buildFile);
$lj->send('install', 'setup/run','install');

ProjectA_Zed_Library_Setup::renderAndExit($propelLog);
