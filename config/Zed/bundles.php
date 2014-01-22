<?php
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
    \ProjectA_Shared_Library_Config::get('projectNamespace') => [],
    // Core bundles
    ProjectA\Shared\Library\Bundle\BundleConfig::NAMESPACE_CORE => [
        'Adyen' => $schema,
        'Acl' => $schemaAndNavigation,
        'Auth' => $bootstrap,
        'Behat' => $navigation,
        'Cart' => $schema,
        'Catalog' => $schemaAndNavigation,
        'Category' => $schemaAndNavigation,
        'Cms' => $schemaAndNavigation,
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
        'ProductImage' => $bootstrapAndSchema,
        'Payment' => $schemaAndNavigation,
        'Payone' => $schema,
        'Price' => $schema,
        'Sales' => $schemaAndNavigation,
        'Salesrule' => $schemaAndNavigation,
        'Setup' => $navigation,
        'Stock' => $schema,
        'System' => $navigation,
        'Yves' => $navigation,
    ],
];
