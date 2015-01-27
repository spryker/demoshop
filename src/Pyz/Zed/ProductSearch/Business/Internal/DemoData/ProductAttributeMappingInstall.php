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
        $this->installAttributeOperations();
        $this->makeProductsSearchable();
    }

    /**
     * @param int $attributeId
     */
    protected function handleStringType($attributeId)
    {
        $copyTargets = [
            'full-text' => 2,
            'full-text-boosted' => 3,
            'suggestion-term' => 4,
            'completion-terms' => 5,
        ];

        $this->addOperation($attributeId, $copyTargets, 'CopyToField');
    }

    /**
     * @param int       $attributeId
     * @param array     $copyTargets
     * @param string    $operation
     *
     * @throws \Exception
     * @throws \PropelException
     */
    protected function addOperation($attributeId, $copyTargets, $operation)
    {
        foreach ($copyTargets as $copyTarget => $weight) {
            $attributeOperationExists = \ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery::create()
                ->filterBySourceAttributeId($attributeId)
                ->filterByTargetField($copyTarget)
                ->filterByWeighting($weight)
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
    }

    protected function installAttributeOperations()
    {
        $attributeEntities = \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery::create()
            ->usePacProductAttributeTypeQuery('pac_attribute_type')
            ->endUse()
            ->select([
                \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID,
                \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME
            ])
            ->setFormatter(
                new \PropelSimpleArrayFormatter()
            )->find()->getArrayCopy();

        foreach ($attributeEntities as $attributeEntity) {

            $attributeId = array_shift($attributeEntity);
            $attributeType = array_shift($attributeEntity);

            switch ($attributeType) {
                case 'string':
                    $this->handleStringType($attributeId);
                    break;
                case 'integer':
                    $this->handleInteger($attributeId);
                    break;
                case 'float':
                    $this->handleFloat($attributeId);
                    break;
                default:
                    break;
            }
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

    /**
     * @param int       $attributeId
     */
    protected function handleInteger($attributeId)
    {
        $copyTargets = ['integer-facet' => 7];

        $this->addOperation($attributeId, $copyTargets, 'CopyToFacet');
    }

    /**
     * @param int $attributeId
     */
    protected function handleFloat($attributeId)
    {
        $copyTargets = ['float-facet' => 7];

        $this->addOperation($attributeId, $copyTargets, 'CopyToFacet');
    }
}
