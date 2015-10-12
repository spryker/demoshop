<?php

include_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;

$filesystem = new Filesystem();

/**
 * @param array $directories
 *
 * @return SplFileInfo[]|Finder
 */
function getFiles(array $directories)
{
    $finder = new Finder();
    $finder->files()->in($directories);

    return $finder;
}

$directories = [
    __DIR__ . '/../config/',
    __DIR__ . '/../src/',
    __DIR__ . '/../tests/',
    __DIR__ . '/../vendor/spryker/spryker/Bundles/',
];

$filesToRename = [
    'SprykerFeature_Shared_Library_Data' => 'SprykerFeature\Shared\Library\DataDirectory',
    'SprykerFeature_Shared_Library_Environment' => 'SprykerFeature\Shared\Library\Environment',
    'SprykerFeature_Shared_Library_Image' => 'SprykerFeature\Shared\Library\Image',
    'SprykerFeature_Shared_Library_Log' => 'SprykerFeature\Shared\Library\Log',
    'SprykerFeature_Zed_Library_Sanitize_Array' => 'SprykerFeature\Zed\Library\Sanitize\ArrayFilter',
    'SprykerFeature_Zed_Library_Sanitize_Filter_Interface' => 'SprykerFeature\Zed\Library\Sanitize\FilterInterface',
    'SprykerFeature_Zed_Library_Sanitize_FilterSet_Interface' => 'SprykerFeature\Zed\Library\Sanitize\FilterSetInterface',
    'SprykerFeature_Zed_Library_Service_GoogleGraph' => 'SprykerFeature\Zed\Library\Service\GoogleGraph',
    'SprykerFeature_Zed_Library_Setup' => 'SprykerFeature\Zed\Library\Setup',
    'SprykerFeature_Zed_Library_Translate' => 'SprykerFeature\Zed\Library\Translate',
    'SprykerFeature_Zed_Sales_Business_Interface_OrderprocessConstant' => 'SprykerFeature\Zed\Sales\Business\OrderProcess\OrderProcessConstant',
    'SprykerFeature_Zed_Setup_Business_Model_System' => 'SprykerFeature\Zed\Setup\Business\Model\System',
    'SprykerFeature_Zed_System_Business_Model_Loadbalancer_BigIP_IPv4' => 'SprykerFeature\Zed\System\Business\Model\Loadbalancer\BigIP\IPv4',
];

$searchAndReplace = [];
foreach ($filesToRename as $oldName => $newName) {
    $searchAndReplace['\\' . $oldName] = $oldName;
    $searchAndReplace[$oldName] = '\\' . $newName;
}
$search = array_keys($searchAndReplace);
$replace = array_values($searchAndReplace);

$files = getFiles($directories);

foreach ($files as $file) {
    $content = $file->getContents();
    $content = str_replace($search, $replace, $content);

    $filesystem->dumpFile($file->getPathname(), $content);
}

