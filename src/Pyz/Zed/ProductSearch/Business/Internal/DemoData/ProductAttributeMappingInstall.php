<?php

namespace Pyz\Zed\ProductSearch\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;

/**
 * Class ProductAttributeMappingInstall
 *
 * @package Zed\ProductSearch\Business\Internal\DemoData
 */
class ProductAttributeMappingInstall implements DemoDataInstallInterface
{
    /**
     * @param Console $console
     *
     * @throws \PropelException
     */
    public function install(Console $console)
    {
        $console->info('This will map installed product attributes to search attributes and will make products exportable for the search');

        if ($console->askConfirmation('Do you really want this?')) {
            $this->installAttributeOperations();
            $this->makeProductsSearchable();
        }

    }

    protected function installAttributeOperations()
    {
        foreach ($this->getMappings() as $sourceField => $operations) {
            $weight = 0;
            foreach ($operations as $operation => $targetFields) {
                foreach ($targetFields as $targetField) {
                    $attribute = \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery::create()
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
                'CopyToField' => [
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
        $attributeOperationExists = \ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery::create()
            ->filterBySourceAttributeId($attributeId)
            ->filterByTargetField($copyTarget)
            ->exists();

        if (!$attributeOperationExists) {
            $attributeOperation = new \ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation();
            $attributeOperation->setTargetField($copyTarget);
            $attributeOperation->setOperation($operation);
            $attributeOperation->setWeighting($weight);
            $attributeOperation->setSourceAttributeId($attributeId);
            $attributeOperation->save();
        }
    }

    protected function makeProductsSearchable()
    {
        $products = \ProjectA_Zed_Product_Persistence_Propel_PacProductQuery::create()->find();

        /** @var \ProjectA_Zed_Product_Persistence_Propel_PacProduct $product */
        foreach ($products as $product) {
            $touchedProduct = \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery::create()
                ->filterByItemId($product->getProductId())
                ->filterByExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_SEARCH)
                ->filterByItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE)
                ->filterByItemType('product')
                ->findOne();

            if (!$touchedProduct) {
                $touchedProduct = new \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();

            }

            $touchedProduct->setItemType('product');
            $touchedProduct->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE);
            $touchedProduct->setExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_SEARCH);
            $touchedProduct->setTouched(new \DateTime());
            $touchedProduct->setItemId($product->getProductId());
            $touchedProduct->save();
        }
    }
}
