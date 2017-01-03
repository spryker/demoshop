<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageProductOptionGroupTransfer;
use Generated\Shared\Transfer\StorageProductOptionValueTransfer;
use Orm\Zed\ProductOption\Persistence\Base\SpyProductOptionGroupQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductOptionCollectorQuery;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionCollector extends AbstractStoragePdoCollector
{

    /**
     * @var array
     */
    protected $optionGroupCache = [];

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductOptionConfig::RESOURCE_TYPE_PRODUCT_OPTION;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $idGroups = explode(',', $collectItemData[ProductOptionCollectorQuery::ID_PRODUCT_OPTION_GROUP]);

        $persistOptionGroups = [];
        foreach ($idGroups as $idGroup) {
            $persistOptionGroups[] = $this->getOptionGroupExportData($idGroup);
        }

        return $persistOptionGroups;
    }

    /**
     * @param int $idProductOptionGroup
     *
     * @return array
     */
    protected function getOptionGroupExportData($idProductOptionGroup)
    {
        if (isset($this->optionGroupCache[$idProductOptionGroup])) {
            return $this->optionGroupCache[$idProductOptionGroup];
        }

        $optionGroupEntity = $this->getOptionGroupEntity($idProductOptionGroup);
        if (!$optionGroupEntity) {
            $this->optionGroupCache[$idProductOptionGroup] = [];
            return [];
        }

        $this->optionGroupCache[$idProductOptionGroup][StorageProductOptionGroupTransfer::NAME] = $optionGroupEntity->getName();
        $this->optionGroupCache[$idProductOptionGroup][StorageProductOptionGroupTransfer::VALUES] = $this->getOptionGroupValues($optionGroupEntity);

        return $this->optionGroupCache[$idProductOptionGroup];
    }

    /**
     * @param \Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup $productOptionGroupEntity
     *
     * @return array
     */
    protected function getOptionGroupValues(SpyProductOptionGroup $productOptionGroupEntity)
    {
        $optionValues = [];
        foreach ($productOptionGroupEntity->getSpyProductOptionValues() as $optionValueEntity) {
            $optionValues[] = [
                StorageProductOptionValueTransfer::ID_PRODUCT_OPTION_VALUE => $optionValueEntity->getIdProductOptionValue(),
                StorageProductOptionValueTransfer::SKU => $optionValueEntity->getSku(),
                StorageProductOptionValueTransfer::PRICE => $optionValueEntity->getPrice(),
                StorageProductOptionValueTransfer::VALUE => $optionValueEntity->getValue(),
            ];
        }
        return $optionValues;
    }

    /**
     * @param int $idOptionGroup
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup
     */
    protected function getOptionGroupEntity($idOptionGroup)
    {
        $optionGroupEntity = SpyProductOptionGroupQuery::create()
            ->filterByIdProductOptionGroup($idOptionGroup)
            ->filterByActive(true)
            ->findOne();

        return $optionGroupEntity;
    }

}
