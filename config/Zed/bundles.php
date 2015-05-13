<?php
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;

$allElements = [
    SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION,
    SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA
];
$schemaAndNavigation = [
    SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA,
    SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION
];
$navigation = [SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION];
$schema = [SprykerFeature\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA];

return [
    // Project bundles
    Config::get(SystemConfig::PROJECT_NAMESPACE) => [],

    // Core bundles
    SprykerFeature\Shared\Library\Bundle\BundleConfig::VENDOR => [
        'Auth' => $schema,
        'Acl' => $schema,
        'User' => $schema,
//        'Cart' => $schema,
        'Cms' => $schema,
        'Category' => $schemaAndNavigation,
        'Country' => $schema,
        'Customer' => $schema,
        'Discount' => $schemaAndNavigation,
        'FrontendExporter' => $schema,
        'Glossary' => $schema,
        'Lumberjack' => $navigation,
        'Oms' => $schema,
        'Payone' => $schema,
        'Price' => $schemaAndNavigation,
        'Product' => $schemaAndNavigation,
        'ProductCategory' => $schema,
        'ProductSearch' => $schema,
        'Sales' => $schemaAndNavigation,
        'SearchPage' => $schemaAndNavigation,
        'Setup' => $navigation,
        'Stock' => $schemaAndNavigation,
        'System' => $navigation,
        'UiExample' => $schemaAndNavigation,
        'Locale' => $schema,
        'Touch' => $schema,
        'Tax' => $schema,
        'Url' => $schema,
    ],
];
