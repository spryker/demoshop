<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor;

use Spryker\Zed\Development\Business\Refactor\AbstractRefactor;
use Symfony\Component\Filesystem\Filesystem;
use Zend\Filter\Word\UnderscoreToCamelCase;

class RenameDatabaseTables extends AbstractRefactor
{

    /**
     * @return void
     */
    public function refactor()
    {
        $this->removeBaseAndMapFiles();
        $this->removeOldFiles();
        $this->renameInSchemaFiles();
        $this->renameInClasses();
    }

    /**
     * @return void
     */
    protected function removeBaseAndMapFiles()
    {
        $directories = [
            __DIR__ . '/../src/Orm/Zed/*/Persistence/Map',
            __DIR__ . '/../src/Orm/Zed/*/Persistence/Base',
        ];

        $filesystem = new Filesystem();
        $filesystem->remove($directories);
    }

    /**
     * @return void
     */
    protected function removeOldFiles()
    {
        $files = [
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyAbstractProduct.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyAbstractProductQuery.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyLocalizedAbstractProductAttributes.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyLocalizedAbstractProductAttributesQuery.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyProductLocalizedAttributes.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyProductLocalizedAttributesQuery.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyTypeValue.php',
            __DIR__ . '/../src/Orm/Zed/Product/Persistence/SpyTypeValueQuery.php',
            __DIR__ . '/../src/Orm/Zed/ProductSearch/Persistence/SpySearchableProducts.php',
            __DIR__ . '/../src/Orm/Zed/ProductSearch/Persistence/SpySearchableProductsQuery.php',
        ];

        $filesystem = new Filesystem();
        $filesystem->remove($files);
    }

    protected function renameInSchemaFiles()
    {
        $schemaDirectories = [
            __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Schema',
            __DIR__ . '/../src/Pyz/Shared/*/Transfer',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Shared/*/Transfer',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema',
        ];
        $schemaFiles = $this->getFiles($schemaDirectories);
        $searchAndReplace = $this->buildSearchAndReplaceForSchema();

        $filesystem = new Filesystem();
        foreach ($schemaFiles as $file) {
            $content = $file->getContents();
            $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
            $filesystem->dumpFile($file->getPathname(), $content);
        }
    }

    /**
     * @return array
     */
    protected function buildSearchAndReplaceForSchema()
    {
        $searchReplaceDefinition = $this->getSearchAndReplaceDefinition();
        $filter = new UnderscoreToCamelCase();

        $searchAndReplace = [];
        foreach ($searchReplaceDefinition as $definition) {
            foreach ($definition['table'] as $from => $to) {
                $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
                $searchAndReplace[$from] = $to;
            }
            foreach ($definition['field'] as $from => $to) {
                $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
                $searchAndReplace[lcfirst($filter->filter($from))] = lcfirst($filter->filter($to));
                $searchAndReplace[$from] = $to;
            }
            foreach ($definition['class'] as $from => $to) {
                $searchAndReplace[$from] = $to;
            }
        }

        return $searchAndReplace;
    }

    protected function renameInClasses()
    {
        $classDirectories = [
            __DIR__ . '/../src/Pyz/',
            __DIR__ . '/../tests/*/Pyz/',
            __DIR__ . '/../tests/DataGenerator/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/*/*/',
        ];

        $classFiles = $this->getFiles($classDirectories);
        $searchAndReplace = $this->buildSearchAndReplaceForClasses();

        $filesystem = new Filesystem();
        foreach ($classFiles as $file) {
            $content = $file->getContents();
            $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
            $filesystem->dumpFile($file->getPathname(), $content);
        }
    }

    /**
     * @return array
     */
    protected function buildSearchAndReplaceForClasses()
    {
        $searchReplaceDefinition = $this->getSearchAndReplaceDefinition();

        $filter = new UnderscoreToCamelCase();

        $searchAndReplace = [];
        foreach ($searchReplaceDefinition as $definition) {
            foreach ($definition['table'] as $from => $to) {
                $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
                $searchAndReplace['$' . lcfirst($filter->filter($from))] = '$' . lcfirst($filter->filter($to));
            }
            foreach ($definition['field'] as $from => $to) {
                $searchAndReplace['COL_' . strtoupper($from)] = 'COL_' . strtoupper($to);
                $searchAndReplace[$filter->filter($from)] = $filter->filter($to);
                $searchAndReplace['$' . lcfirst($filter->filter($from))] = '$' . lcfirst($filter->filter($to));
            }
            foreach ($definition['class'] as $from => $to) {
                $searchAndReplace[$from] = $to;
            }

            $searchAndReplace['abstract_product'] = 'product_abstract';
        }

        return $searchAndReplace;
    }

    /**
     * @return array
     */
    protected function getSearchAndReplaceDefinition()
    {
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
            ],
        ];

        return $searchReplaceDefinition;
    }

}
