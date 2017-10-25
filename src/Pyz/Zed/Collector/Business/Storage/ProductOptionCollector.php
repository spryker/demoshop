<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageProductOptionGroupTransfer;
use Generated\Shared\Transfer\StorageProductOptionValueTransfer;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePrice;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Currency\Business\CurrencyFacadeInterface;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;
use Spryker\Zed\ProductOption\ProductOptionConfig;
use Spryker\Zed\Store\Business\StoreFacadeInterface;

class ProductOptionCollector extends AbstractStoragePdoCollector
{
    const AMOUNT = 'amount';

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
     * @var \Spryker\Zed\Store\Business\StoreFacadeInterface
     */
    protected $storeFacade;

    /**
     * @var \Spryker\Zed\Currency\Business\CurrencyFacadeInterface
     */
    protected $currencyFacade;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var string
     */
    protected static $netPriceModeIdentifierCache;

    /**
     * @var string
     */
    protected static $grossPriceModeIdentifierCache;

    /**
     * @var \Generated\Shared\Transfer\StoreTransfer
     */
    protected static $currentStoreTransferCache;

    /**
     * @var string[] Keys are currency ids, values are currency codes.
     */
    protected static $currencyCodeCache = [];

    /**
     * @param \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface $productOptionQueryContainer
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\Currency\Business\CurrencyFacadeInterface $currencyFacade
     * @param \Spryker\Zed\Store\Business\StoreFacadeInterface $storeFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     */
    public function __construct(
        ProductOptionQueryContainerInterface $productOptionQueryContainer,
        UtilDataReaderServiceInterface $utilDataReaderService,
        CurrencyFacadeInterface $currencyFacade,
        StoreFacadeInterface $storeFacade,
        PriceFacadeInterface $priceFacade
    ) {
        parent::__construct($utilDataReaderService);

        $this->productOptionQueryContainer = $productOptionQueryContainer;
        $this->currencyFacade = $currencyFacade;
        $this->storeFacade = $storeFacade;
        $this->priceFacade = $priceFacade;
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
                StorageProductOptionValueTransfer::PRICES => $this->getStorePrices($optionValueEntity->getProductOptionValuePrices()),
                StorageProductOptionValueTransfer::VALUE => $optionValueEntity->getValue(),
            ];
        }
        return $optionValues;
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePrice[] $priceCollection
     *
     * @return array
     */
    protected function getStorePrices(ObjectCollection $priceCollection)
    {
        $currentStoreTransfer = $this->getCurrentStoreTransfer();
        $storePrices = [];
        $defaultStorePrices = [];

        foreach ($priceCollection as $priceEntity) {
            if ($priceEntity->getFkStore() === null) {
                $defaultStorePrices = $this->addPrice($defaultStorePrices, $priceEntity);

                continue;
            }

            if ($priceEntity->getFkStore() === $currentStoreTransfer->getIdStore()) {
                $storePrices = $this->addPrice($storePrices, $priceEntity);
            }
        }

        return array_merge($defaultStorePrices, $storePrices);
    }

    /**
     * @param array $prices
     * @param \Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePrice $priceEntity
     *
     * @return array
     */
    protected function addPrice(array $prices, SpyProductOptionValuePrice $priceEntity)
    {
        $prices[$this->getCurrencyCodeById($priceEntity->getFkCurrency())] = [
            $this->getGrossPriceModeIdentifier() => [
                static::AMOUNT => $priceEntity->getGrossPrice(),
            ],
            $this->getNetPriceModeIdentifier() => [
                static::AMOUNT => $priceEntity->getNetPrice(),
            ],
        ];

        return $prices;
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

    /**
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    protected function getCurrentStoreTransfer()
    {
        if (!isset(static::$currentStoreTransferCache)) {
            static::$currentStoreTransferCache = $this->storeFacade->getCurrentStore();
        }

        return static::$currentStoreTransferCache;
    }

    /**
     * @param int $idCurrency
     *
     * @return string
     */
    protected function getCurrencyCodeById($idCurrency)
    {
        if (!isset(static::$currencyCodeCache[$idCurrency])) {
            static::$currencyCodeCache[$idCurrency] = $this->currencyFacade->getByIdCurrency($idCurrency)->getCode();
        }

        return static::$currencyCodeCache[$idCurrency];
    }

    /**
     * @return string
     */
    protected function getNetPriceModeIdentifier()
    {
        if (!isset(static::$netPriceModeIdentifierCache)) {
            static::$netPriceModeIdentifierCache = $this->priceFacade->getNetPriceModeIdentifier();
        }

        return static::$netPriceModeIdentifierCache;
    }

    /**
     * @return string
     */
    protected function getGrossPriceModeIdentifier()
    {
        if (!isset(static::$grossPriceModeIdentifierCache)) {
            static::$grossPriceModeIdentifierCache = $this->priceFacade->getGrossPriceModeIdentifier();
        }

        return static::$grossPriceModeIdentifierCache;
    }
}
