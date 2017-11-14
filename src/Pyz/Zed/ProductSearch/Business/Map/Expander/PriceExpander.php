<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Expander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Client\CatalogPriceProductConnector\CatalogPriceProductConnectorClientInterface;
use Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class PriceExpander implements ProductPageMapExpanderInterface
{
    /**
     * @var \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface
     */
    protected $priceProductFacade;

    /**
     * @var \Spryker\Client\CatalogPriceProductConnector\CatalogPriceProductConnectorClientInterface
     */
    protected $catalogPriceProductConnectorClient;

    /**
     * @param \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface $priceProductFacade
     * @param \Spryker\Client\CatalogPriceProductConnector\CatalogPriceProductConnectorClientInterface $catalogPriceProductConnectorClient
     */
    public function __construct(
        PriceProductFacadeInterface $priceProductFacade,
        CatalogPriceProductConnectorClientInterface $catalogPriceProductConnectorClient
    ) {
        $this->priceProductFacade = $priceProductFacade;
        $this->catalogPriceProductConnectorClient = $catalogPriceProductConnectorClient;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {

        $price = (int)$this->priceProductFacade->findPriceBySku($productData['abstract_sku']);

        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'price', $price)
            ->addIntegerSort($pageMapTransfer, 'price', $price)
            ->addIntegerFacet($pageMapTransfer, 'price', $price);

        $this->setPricesByType($pageMapBuilder, $pageMapTransfer, $productData);

        return $pageMapTransfer;
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $productData
     *
     * @return void
     */
    protected function setPricesByType(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $productData
    ) {

        $pricesGrouped = $this->priceProductFacade->findPricesBySkuGrouped($productData['abstract_sku']);

        foreach ($pricesGrouped as $currencyIsoCode => $pricesByPriceMode) {
            foreach ($pricesByPriceMode as $priceMode => $pricesByType) {
                foreach ($pricesByType as $priceType => $price) {
                    $facetName = $this->catalogPriceProductConnectorClient->buildPricedIdentifierFor($priceType, $currencyIsoCode, $priceMode);
                    $pageMapBuilder->addIntegerFacet($pageMapTransfer, $facetName, $price);
                    $pageMapBuilder->addIntegerSort($pageMapTransfer, $facetName, $price);
                }
            }
        }

        $pageMapBuilder->addSearchResultData($pageMapTransfer, 'prices', $pricesGrouped);
    }
}
