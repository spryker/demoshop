<?php

namespace Pyz\Zed\ProductSearch\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Product\Persistence\Propel\SpyProductAttributesMetadataQuery;
use ProjectA\Zed\Product\Persistence\Propel\SpyProductQuery;
use ProjectA\Zed\ProductSearch\Persistence\Propel\SpyProductSearchAttributesOperation;
use ProjectA\Zed\ProductSearch\Persistence\Propel\SpyProductSearchAttributesOperationQuery;
use ProjectA\Zed\ProductSearch\Persistence\Propel\SpySearchableProductsQuery;
use Propel\Runtime\Exception\PropelException;

class ProductAttributeMappingInstall extends AbstractInstaller
{

    public function install()
    {
        $this->info(
            'Map installed product attributes to search attributes and will make products exportable for the search'
        );

        $this->installAttributeOperations();
        $this->makeProductsSearchable();
    }

    protected function installAttributeOperations()
    {
        foreach ($this->getMappings() as $sourceField => $operations) {
            $weight = 0;
            foreach ($operations as $operation => $targetFields) {
                foreach ($targetFields as $targetField) {
                    $attribute = SpyProductAttributesMetadataQuery::create()
                        ->findOneByKey($sourceField);
                    if ($attribute) {
                        $weight++;
                        $attributeId = $attribute->getAttributeId();
                        $this->addOperation($attributeId, $targetField, $operation, $weight);

                    }
                }
            }
        }
    }

    protected function getMappings()
    {
        return [
            'description' => [
                'CopyToField' => [
                    'full-text-boosted',
                    'full-text',
                    'suggestion-term',
                    'completion-terms'
                ]
            ],
            'price' => [
                'CopyToFacet' => [
                    'integer-facet',
                ],
                'CopyToMultiField' => [
                    'integer-sort'
                ]
            ],
            'weight' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'age' => [
                'CopyToFacet' => [
                    'integer-facet'
                ]
            ],
            'brand' => [
                'CopyToField' => [
                    'full-text',
                    'full-text-boosted',
                    'completion-terms',
                    'suggestion-term',
                ],
                'CopyToFacet' => [
                    'string-facet',
                ]
            ],
            'depth' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'width' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'height' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'gender' => [
                'CopyToFacet' => [
                    'string-facet'
                ]
            ],
            'material' => [
                'CopyToField' => [
                    'full-text',
                    'full-text-boosted',
                    'completion-terms',
                    'suggestion-term',
                ],
                'CopyToFacet' => [
                    'string-facet',
                ]
            ],
            'main_color' => [
                'CopyToField' => [
                    'full-text',
                    'full-text-boosted',
                    'completion-terms',
                    'suggestion-term',
                ],
                'CopyToFacet' => [
                    'string-facet',
                ]
            ]
        ];
    }

    /**
     * @param int $attributeId
     * @param string $copyTarget
     * @param string $operation
     *
     * @throws \Exception
     * @throws PropelException
     */
    protected function addOperation($attributeId, $copyTarget, $operation, $weight)
    {
        $attributeOperationExists = SpyProductSearchAttributesOperationQuery::create()
            ->filterBySourceAttributeId($attributeId)
            ->filterByTargetField($copyTarget)
            ->findOne();

        if (!$attributeOperationExists) {
            $attributeOperation = new SpyProductSearchAttributesOperation();
            $attributeOperation->setTargetField($copyTarget);
            $attributeOperation->setOperation($operation);
            $attributeOperation->setWeighting($weight);
            $attributeOperation->setSourceAttributeId($attributeId);
            $attributeOperation->save();
        }
    }

    protected function makeProductsSearchable()
    {
        $products = SpyProductQuery::create()->find();
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();

        $touchFacade = $locator->touch()->facade();
        $localeFacade = $locator->locale()->facade();

        // TODO check hardcoded locale
        $localeId = $localeFacade->getLocaleIdentifier('de_DE');
        $products = SpyProductQuery::create()->find();

        /** @var \ProjectA\Zed\Product\Persistence\Propel\SpyProduct $product */
        foreach ($products as $product) {
                ->filterByFkProduct($product->getProductId())
            $searchableProduct = SpySearchableProductsQuery::create()
                ->filterByFkLocale($localeId)
                ->findOneOrCreate();
            $searchableProduct->setIsSearchable(true);
            $searchableProduct->save();

            $touchFacade->touchActive('searchableProduct', $product->getProductId());
        }
    }
}
