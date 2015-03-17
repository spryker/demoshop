<?php

namespace Pyz\Zed\ProductSearch\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;

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
                    $attribute = \ProjectA\Zed\Product\Persistence\Propel\PacProductAttributesMetadataQuery::create()
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
     * @throws \PropelException
     */
    protected function addOperation($attributeId, $copyTarget, $operation, $weight)
    {
        $attributeOperationExists = \ProjectA\Zed\ProductSearch\Persistence\Propel\PacProductSearchAttributesOperationQuery::create()
            ->filterBySourceAttributeId($attributeId)
            ->filterByTargetField($copyTarget)
            ->findOne();

        if (!$attributeOperationExists) {
            $attributeOperation = new \ProjectA\Zed\ProductSearch\Persistence\Propel\PacProductSearchAttributesOperation();
            $attributeOperation->setTargetField($copyTarget);
            $attributeOperation->setOperation($operation);
            $attributeOperation->setWeighting($weight);
            $attributeOperation->setSourceAttributeId($attributeId);
            $attributeOperation->save();
        }
    }

    protected function makeProductsSearchable()
    {
        $products = \ProjectA\Zed\Product\Persistence\Propel\PacProductQuery::create()->find();
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();

        $touchFacade = $locator->touch()->facade();
        $localeFacade = $locator->locale()->facade();

        // TODO check hardcoded locale
        $localeId = $localeFacade->getLocaleIdentifier('de_DE');
        $products = \ProjectA\Zed\Product\Persistence\Propel\PacProductQuery::create()->find();

        /** @var \ProjectA\Zed\Product\Persistence\Propel\PacProduct $product */
        foreach ($products as $product) {
            $searchableProduct = \ProjectA\Zed\ProductSearch\Persistence\Propel\PacSearchableProductsQuery::create()
                ->filterByFkProduct($product->getProductId())
                ->filterByFkLocale($localeId)
                ->findOneOrCreate();
            $searchableProduct->setIsSearchable(true);
            $searchableProduct->save();

            $touchFacade->touchActive('searchableProduct', $product->getProductId());
        }
    }
}
