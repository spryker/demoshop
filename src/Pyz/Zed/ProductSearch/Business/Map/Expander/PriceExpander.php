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
use Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class PriceExpander implements ProductPageMapExpanderInterface
{
    /**
     * @var \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface
     */
    protected $priceProductFacade;

    /**
     * @param \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface $priceFacade
     */
    public function __construct(PriceProductFacadeInterface $priceFacade)
    {
        $this->priceProductFacade = $priceFacade;
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

            $prices[$currencyTransfer->getCode()]['GROSS_MODE'][$priceProductTransfer->getPriceTypeName()] = $moneyValueTransfer->getGrossAmount();
            $prices[$currencyTransfer->getCode()]['NET_MODE'][$priceProductTransfer->getPriceTypeName()] = $moneyValueTransfer->getNetAmount();

            $pageMapBuilder->addIntegerFacet(
                $pageMapTransfer,
                $this->buildPriceIntegerFacetName($priceProductTransfer, $currencyTransfer->getCode(), 'GROSS_MODE'),
                $moneyValueTransfer->getGrossAmount()
            );

            $pageMapBuilder->addIntegerFacet(
                $pageMapTransfer,
                $this->buildPriceIntegerFacetName($priceProductTransfer, $currencyTransfer->getCode(), 'NET_MODE'),
                $moneyValueTransfer->getNetAmount()
            );
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
        return sprintf('price.%s.%s.%s', $priceProductTransfer->getPriceTypeName(), $currencyCode, $priceMode);
    }
}
