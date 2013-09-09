<?php

require_once __DIR__ . '/../../../src/Sao/Zed/Application/include.php';

$config = new Zend_Config_Ini(APPLICATION_ROOT_DIR . '/config/Zed/application.ini', APPLICATION_ENV);
$propelConfig = $config->get('propel');

$list = new ProjectA_Zed_Library_File_Filesystem_List($propelConfig->get('propel_gen_directory'), true);
$buildFile = new ProjectA_Zed_Library_Memory_File('build.properties', '');
$list->add($buildFile);

$schemata = require APPLICATION_ROOT_DIR . '/config/Zed/schemata.php';

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
$lj->send('install', 'setup/run', 'install');

ProjectA_Zed_Library_Setup::renderAndExit($propelLog);
