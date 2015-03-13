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
    ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_CORE => [
        'Acl' => $schemaAndNavigation,
        'Cart' => $schema,
        'Cms' => $allElements,
        'Category' => $schemaAndNavigation,
        'Customer2' => $schema,
        'FrontendExporter' => $schema,
        'Glossary' => $allElements,
        'Lumberjack' => $navigation,
        'Mail' => $schemaAndNavigation,
        'Misc' => $schema,
        'Oms' => $schema,
        'ProductImage' => $schema,
        'Price' => $schema,
        'Product' => $schemaAndNavigation,
        'ProductCategory' => $schema,
        'ProductSearch' => $schema,
        'Sales' => $schemaAndNavigation,
        'Salesrule' => $schemaAndNavigation,
        'Setup' => $navigation,
        'Stock' => $schema,
        'System' => $navigation,
        'Yves' => $schemaAndNavigation
    ],

    \ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_SPRYKERCORE => [
        'Locale' => $schema,
        'Touch' => $schema
    ]
];
