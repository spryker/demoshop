<?php

include_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

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

$searchReplaceDefinition = [
    [
        'table' => [
            'spy_abstract_product' => 'spy_product_abstract',
            'spy_abstract_product_localized_attributes' => 'spy_product_abstract_localized_attributes',
            'spy_attributes_metadata' => 'spy_product_attributes_metadata',
            'spy_attribute_type' => 'spy_product_attribute_type',
            'spy_attribute_type_value' => 'spy_product_attribute_type_value',
            'spy_redirect' => 'spy_url_redirect',
            'spy_searchable_products' => 'spy_product_search',
        ],
        'field' => [
            'id_abstract_product' => 'id_product_abstract',
            'fk_abstract_product' => 'fk_product_abstract',
            'spy_abstract_product_pk_seq' => 'spy_product_abstract_pk_seq',
            'fk_resource_abstract_product' => 'fk_resource_product_abstract',
            'id_attributes' => 'id_product_attributes',
            'id_attributes_metadata' => 'id_product_attributes_metadata',
            'spy_attributes_metadata_pk_seq' => 'spy_product_attributes_metadata_pk_seq',
            'spy_attribute_type' => 'spy_product_attribute_type',
            'id_type' => 'id_product_attribute_type',
            'fk_parent_type' => 'fk_product_attribute_type_parent',
            'spy_attribute_type_pk_seq' => 'spy_product_attribute_type_pk_seq',
            'spy_attribute_type_value_pk_seq' => 'spy_product_attribute_type_value_pk_seq',
            'id_redirect' => 'id_url_redirect',
            'spy_redirect_pk_seq' => 'spy_url_redirect_pk_seq',
            'searchable_id' => 'id_product_search',
            'spy_searchable_products_pk_seq' => 'spy_product_search_pk_seq',
        ],
        'class' => [
            'SpyLocalizedProductAttributes' => 'SpyProductLocalizedAttributes',
            'SpyTypeValue' => 'SpyProductAttributeTypeValue',
            'SpyRedirect' => 'SpyUrlRedirect',
        ],
    ]
];

$xmlSearchAndReplace = function (array $searchReplaceDefinition) {
    $filter = new \Zend\Filter\Word\UnderscoreToCamelCase();

    $searchAndReplace = [];
    foreach ($searchReplaceDefinition as $definition) {
        foreach ($definition['table'] as $from => $to) {
            $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
            $searchAndReplace[$from] = $to;
        }
        foreach ($definition['field'] as $from => $to) {
            $searchAndReplace[$from] = $to;
        }
        foreach ($definition['class'] as $from => $to) {
            $searchAndReplace[$from] = $to;
        }
    }

    return $searchAndReplace;
};

$classSearchAndReplace = function (array $searchReplaceDefinition) {
    $filter = new \Zend\Filter\Word\UnderscoreToCamelCase();

    $searchAndReplace = [];
    foreach ($searchReplaceDefinition as $definition) {
        foreach ($definition['table'] as $from => $to) {
            $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
            $searchAndReplace['$'.lcfirst($filter->filter($from))] = '$'.lcfirst($filter->filter($to));
        }
        foreach ($definition['fields'] as $from => $to) {
            $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
            $searchAndReplace['$'.lcfirst($filter->filter($from))] = '$'.lcfirst($filter->filter($to));
        }
        foreach ($definition['class'] as $from => $to) {
            $searchAndReplace[$from] = $to;
        }
    }

    return $searchAndReplace;
};

$schemaDirectories = [
//    __DIR__.'/../src/Pyz/Zed/*/Persistence/Propel/Schema',
    __DIR__.'/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema',
];
$schemaFiles = getFiles($schemaDirectories);
$searchAndReplace = $xmlSearchAndReplace($searchReplaceDefinition);

foreach ($schemaFiles as $file) {
    $content = $file->getContents();
    $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
    $filesystem->dumpFile($file->getPathname(), $content);
}

$classDirectories = [
    __DIR__.'/../src/Pyz/Zed/',
    __DIR__.'/../tests/*/Pyz/Zed/',
    __DIR__.'/../vendor/spryker/spryker/Bundles/*/src/*/Zed',
    __DIR__.'/../vendor/spryker/spryker/Bundles/*/tests/*/*/Zed',
];
$classFiles = getFiles($classDirectories);
$searchAndReplace = $classSearchAndReplace($searchReplaceDefinition);

foreach ($classFiles as $file) {
    $content = $file->getContents();
    $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
    $filesystem->dumpFile($file->getPathname(), $content);
}
