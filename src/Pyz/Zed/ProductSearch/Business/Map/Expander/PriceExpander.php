<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Expander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Generated\Shared\Transfer\PriceFilterTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class PriceExpander implements ProductPageMapExpanderInterface
{
    /**
     * @var string
     */
    protected static $netPriceModeIdentifier;

    /**
     * @var string
     */
    protected static $grossPriceModeIdentifier;

    /**
     * @var \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface
     */
    protected $priceProductFacade;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @param \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface $priceProductFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    public function __construct(
        PriceProductFacadeInterface $priceProductFacade,
        PriceFacadeInterface $priceFacade
    )
    {
        $this->priceProductFacade = $priceProductFacade;
        $this->priceFacade = $priceFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer)
    {
        $price = $this->getPriceBySku($productData['abstract_sku']);

        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'price', $price)
            ->addIntegerSort($pageMapTransfer, 'price', $price)
            ->addIntegerFacet($pageMapTransfer, 'price', $price);

        $this->setPricesByType($pageMapBuilder, $pageMapTransfer, $productData);

        return $pageMapTransfer;
    }

    /**
     * @param string $sku
     *
     * @return int
     */
    protected function getPriceBySku($sku)
    {
        return $this->priceProductFacade->getPriceBySku($sku);
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $productData
     *
     * @return void
     */
    protected function setPricesByType(PageMapBuilderInterface $pageMapBuilder, PageMapTransfer $pageMapTransfer, array $productData)
    {
        $priceProductTransfers = $this->priceProductFacade->findPricesBySku($productData['abstract_sku']);

        $prices = [];
        foreach ($priceProductTransfers as $priceProductTransfer) {
            $moneyValueTransfer = $priceProductTransfer->getMoneyValue();
            $currencyTransfer = $moneyValueTransfer->getCurrency();

            $prices[$currencyTransfer->getCode()][$this->getGrossPriceModeIdentifier()][$priceProductTransfer->getPriceTypeName()] = $moneyValueTransfer->getGrossAmount();
            $prices[$currencyTransfer->getCode()][$this->getNetPriceModeIdentifier()][$priceProductTransfer->getPriceTypeName()] = $moneyValueTransfer->getNetAmount();

            $integerGrossFacetName = $this->buildPriceIntegerFacetName(
                $priceProductTransfer,
                $currencyTransfer->getCode(),
                $this->getNetPriceModeIdentifier()
            );

            $integerNetFacetName = $this->buildPriceIntegerFacetName(
                $priceProductTransfer,
                $currencyTransfer->getCode(),
                $this->getGrossPriceModeIdentifier()
            );

            $pageMapBuilder->addIntegerFacet(
                $pageMapTransfer,
                $integerGrossFacetName,
                $moneyValueTransfer->getGrossAmount()
            );

            $pageMapBuilder->addIntegerFacet(
                $pageMapTransfer,
                $integerNetFacetName,
                $moneyValueTransfer->getNetAmount()
            );

            $pageMapBuilder->addIntegerSort($pageMapTransfer, $integerGrossFacetName,  $moneyValueTransfer->getGrossAmount());
            $pageMapBuilder->addIntegerSort($pageMapTransfer, $integerNetFacetName,  $moneyValueTransfer->getNetAmount());

        }

        $pageMapBuilder->addSearchResultData($pageMapTransfer, 'prices', $prices);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     * @param string $currencyCode
     * @param string $priceMode
     *
     * @return string
     */
    protected function buildPriceIntegerFacetName(PriceProductTransfer $priceProductTransfer, $currencyCode, $priceMode)
    {
        return sprintf('price-%s-%s-%s', $priceProductTransfer->getPriceTypeName(), $currencyCode, $priceMode);
    }

    /**
     * @return string
     */
    protected function getNetPriceModeIdentifier()
    {
        if (!static::$netPriceModeIdentifier) {
            static::$netPriceModeIdentifier = $this->priceFacade->getNetPriceModeIdentifier();
        }

        return static::$netPriceModeIdentifier;
    }

    /**
     * @return string
     */
    protected function getGrossPriceModeIdentifier()
    {
        if (!static::$grossPriceModeIdentifier) {
            static::$grossPriceModeIdentifier = $this->priceFacade->getGrossPriceModeIdentifier();
        }

        return static::$grossPriceModeIdentifier;
    }
}
