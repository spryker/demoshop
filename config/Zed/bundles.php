<?php
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;

$allElements = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_BOOTSTRAP,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA
];
$bootstrapAndNavigation = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_BOOTSTRAP,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION
];
$bootstrapAndSchema = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_BOOTSTRAP,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA
];
$schemaAndNavigation = [
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA,
    ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION
];
$navigation = [ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_NAVIGATION];
$bootstrap = [ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_BOOTSTRAP];
$schema = [ProjectA\Shared\Library\Bundle\BundleConfig::ACTIVATE_SCHEMA];

return [
    // Project bundles
    Config::get(SystemConfig::PROJECT_NAMESPACE) => [],
    // Core bundles
    ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_CORE => [
        'Acl' => $schemaAndNavigation,
        'Auth' => $bootstrap,
        'Behat' => $navigation,
        'Cart' => $schema,
        'Cms' => $allElements,
        'Catalog' => $schemaAndNavigation,
        'Category' => $schemaAndNavigation,
        'Customer' => $schemaAndNavigation,
        'Dwh' => $schemaAndNavigation,
        'Document' => $schema,
        'Glossary' => $allElements,
        'Invoice' => $schema,
        'Kendo' => $schema,
        'Lumberjack' => $navigation,
        'Mail' => $schemaAndNavigation,
        'Mcm' => $schemaAndNavigation,
        'Mci' => $schemaAndNavigation,
        'Misc' => $schema,
        'Newsletter' => $schema,
        'Oms' => $schema,
        'ProductImage' => $bootstrapAndSchema,
        'Payment' => $schemaAndNavigation,
        'Payone' => $schema,
        'PaymentControl' => $schema,
        'Price' => $schema,
        'Product' => $schema,
        'Sales' => $schemaAndNavigation,
        'Salesrule' => $schemaAndNavigation,
        'Setup' => $navigation,
        'Stock' => $schema,
        'System' => $navigation,
        'Tv' => $schemaAndNavigation,
        'Yves' => $schemaAndNavigation,
    ],
];
