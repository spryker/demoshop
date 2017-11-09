<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use ArrayObject;
use Generated\Shared\Transfer\MoneyValueTransfer;
use Generated\Shared\Transfer\ProductOptionValueStorePricesRequestTransfer;
use Generated\Shared\Transfer\StorageProductOptionGroupTransfer;
use Generated\Shared\Transfer\StorageProductOptionValueTransfer;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface;
use Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionCollector extends AbstractStoragePdoCollector
{
    const ID_PRODUCT_OPTION_GROUP = 'id_product_option_group';

    /**
     * @var array
     */
    protected $optionGroupCache = [];

    /**
     * @var \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface
     */
    protected $productOptionQueryContainer;

    /**
     * @var \Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface
     */
    protected $productOptionFacade;

    /**
     * @param \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface $productOptionQueryContainer
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface $productOptionFacade
     */
    public function __construct(
        ProductOptionQueryContainerInterface $productOptionQueryContainer,
        UtilDataReaderServiceInterface $utilDataReaderService,
        ProductOptionFacadeInterface $productOptionFacade
    ) {
        parent::__construct($utilDataReaderService);

        $this->productOptionQueryContainer = $productOptionQueryContainer;
        $this->productOptionFacade = $productOptionFacade;
    }

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
        $idGroups = explode(',', $collectItemData[self::ID_PRODUCT_OPTION_GROUP]);

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

        $optionGroupEntity = $this->getOptionGroupEntityById($idProductOptionGroup);
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
                StorageProductOptionValueTransfer::PRICES => $this->getPrices($optionValueEntity->getProductOptionValuePrices()),
                StorageProductOptionValueTransfer::VALUE => $optionValueEntity->getValue(),
            ];
        }
        return $optionValues;
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePrice[] $objectCollection
     *
     * @return array
     */
    protected function getPrices(ObjectCollection $objectCollection)
    {
        $moneyValueCollection = $this->transformPriceEntityCollectionToMoneyValueTransferCollection($objectCollection);

        $priceResponse = $this->productOptionFacade->getProductOptionValueStorePrices(
            (new ProductOptionValueStorePricesRequestTransfer())->setPrices($moneyValueCollection)
        );

        return $priceResponse->getStorePrices();
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePrice[] $priceEntityCollection
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\MoneyValueTransfer[]
     */
    protected function transformPriceEntityCollectionToMoneyValueTransferCollection(ObjectCollection $priceEntityCollection)
    {
        $moneyValueCollection = new ArrayObject();
        foreach ($priceEntityCollection as $productOptionValuePriceEntity) {
            $moneyValueCollection->append(
                (new MoneyValueTransfer())
                    ->fromArray($productOptionValuePriceEntity->toArray(), true)
                    ->setNetAmount($productOptionValuePriceEntity->getNetPrice())
                    ->setGrossAmount($productOptionValuePriceEntity->getGrossPrice())
            );
        }

        return $moneyValueCollection;
    }

    /**
     * @param int $idProductOptionGroup
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup
     */
    protected function getOptionGroupEntityById($idProductOptionGroup)
    {
        $optionGroupCollection = $this->productOptionQueryContainer
            ->queryActiveProductOptionGroupWithProductOptionValuesAndProductOptionValuePricesById($idProductOptionGroup)
            ->find();

        return $optionGroupCollection->getFirst();
    }
}
