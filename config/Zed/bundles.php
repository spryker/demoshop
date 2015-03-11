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
    //@TODO NEW CORE: need to move CORE2 to CORE
    ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_CORE2 => [
        'Acl' => $schema
    ],
    // Core bundles
    ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_CORE => [
//        'Acl' => $schemaAndNavigation,
        'Cart' => $schema,
        'Cms' => $allElements,
        'Catalog' => $schemaAndNavigation,
        'Category' => $schemaAndNavigation,
        'Customer' => $schemaAndNavigation,
        'Customer2' => $schema,
        'Document' => $schema,
        'FrontendExporter' => $schema,
        'Glossary' => $allElements,
        'Invoice' => $schema,
        'Kendo' => $schema,
        'Lumberjack' => $navigation,
        'Mail' => $schemaAndNavigation,
        'Misc' => $schema,
        'Newsletter' => $schema,
        'Oms' => $schema,
        'ProductImage' => $schema,
        'Payment' => $schemaAndNavigation,
        'Payone' => $schema,
        'PaymentControl' => $schema,
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
