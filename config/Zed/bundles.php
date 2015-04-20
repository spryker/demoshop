<?php
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;

$allElements = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA
];
$schemaAndNavigation = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION
];
$navigation = [ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION];
$schema = [ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA];

return [
    // Project bundles
    Config::get(SystemConfig::PROJECT_NAMESPACE) => [],

    // Core bundles
    ProjectA\Shared\Library\Bundle\BundleConfig::VENDOR => [
        'Auth' => $schema,
        'Acl' => $schema,
        'User' => $schema,
        'Cart' => $schema,
        'Cms' => $schema,
        'Category' => $schemaAndNavigation,
        'Country' => $schema,
        'Customer2' => $schema,
        'Discount' => $schemaAndNavigation,
        'FrontendExporter' => $schema,
        'Glossary' => $schemaAndNavigation,
        'Lumberjack' => $navigation,
        'Oms' => $schema,
        'Price' => $schemaAndNavigation,
        'Product' => $schemaAndNavigation,
        'ProductCategory' => $schema,
        'ProductSearch' => $schema,
        'Sales' => $schemaAndNavigation,
        'Salesrule' => $schemaAndNavigation,
        'Setup' => $navigation,
        'Stock' => $schema,
        'System' => $navigation,
        'UiExample' => $schemaAndNavigation,
        'Locale' => $schema,
        'Touch' => $schema,
        'Url' => $schema,
    ],
];
