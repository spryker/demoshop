<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Config;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\FacetConfigTransfer;
use Generated\Shared\Transfer\PaginationConfigTransfer;
use Generated\Shared\Transfer\SortConfigTransfer;
use Pyz\Client\ProductReview\Plugin\ProductRatingValueTransformer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductLabel\Plugin\ProductLabelFacetValueTransformerPlugin;
use Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\PaginationConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SearchConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface;
use Spryker\Client\Search\Model\Elasticsearch\Aggregation\CategoryFacetAggregation;
use Spryker\Shared\Search\SearchConfig;

/**
 * @method \Pyz\Client\Catalog\CatalogFactory getFactory()
 */
class CatalogSearchConfigBuilder extends AbstractPlugin implements SearchConfigBuilderInterface
{
    const DEFAULT_ITEMS_PER_PAGE = 12;
    const VALID_ITEMS_PER_PAGE_OPTIONS = [12, 24, 36];
    const SIZE_UNLIMITED = 0;

    const CATEGORY_FACET_PARAM_NAME = 'category';
    const LABEL_FACET_NAME = 'label';
    const RATING_FACET_NAME = 'rating';

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return void
     */
    public function buildFacetConfig(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $this
            ->addCategoryFacet($facetConfigBuilder)
            ->addPriceFacet($facetConfigBuilder)
            ->addProductLabelFacet($facetConfigBuilder)
            ->addProductRatingFacet($facetConfigBuilder);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return void
     */
    public function buildSortConfig(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $this
            ->addDescendingRatingSort($sortConfigBuilder)
            ->addAscendingNameSort($sortConfigBuilder)
            ->addDescendingNameSort($sortConfigBuilder)
            ->addAscendingPriceSort($sortConfigBuilder)
            ->addDescendingPriceSort($sortConfigBuilder);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\PaginationConfigBuilderInterface $paginationConfigBuilder
     *
     * @return void
     */
    public function buildPaginationConfig(PaginationConfigBuilderInterface $paginationConfigBuilder)
    {
        $paginationConfigTransfer = (new PaginationConfigTransfer())
            ->setParameterName('page')
            ->setItemsPerPageParameterName('ipp')
            ->setDefaultItemsPerPage(self::DEFAULT_ITEMS_PER_PAGE)
            ->setValidItemsPerPageOptions(self::VALID_ITEMS_PER_PAGE_OPTIONS);

        $paginationConfigBuilder->setPagination($paginationConfigTransfer);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addCategoryFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $categoryFacet = (new FacetConfigTransfer())
            ->setName('category')
            ->setParameterName(static::CATEGORY_FACET_PARAM_NAME)
            ->setFieldName(PageIndexMap::CATEGORY_ALL_PARENTS)
            ->setType(SearchConfig::FACET_TYPE_CATEGORY)
            ->setAggregationParams([
                CategoryFacetAggregation::AGGREGATION_PARAM_SIZE => static::SIZE_UNLIMITED,
            ]);

        $facetConfigBuilder->addFacet($categoryFacet);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addPriceFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $priceIdentifier = $this->getFactory()
            ->getCatalogPriceProductConnectorClient()
            ->buildPriceIdentifierForCurrentCurrency();

        $priceFacet = (new FacetConfigTransfer())
            ->setName($priceIdentifier)
            ->setParameterName('price')
            ->setFieldName(PageIndexMap::INTEGER_FACET)
            ->setType(SearchConfig::FACET_TYPE_PRICE_RANGE);

        $facetConfigBuilder->addFacet($priceFacet);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addProductLabelFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $productLabelFacetTransfer = (new FacetConfigTransfer())
            ->setName(static::LABEL_FACET_NAME)
            ->setParameterName('Som')
            ->setFieldName(PageIndexMap::STRING_FACET)
            ->setType(SearchConfig::FACET_TYPE_ENUMERATION)
            ->setIsMultiValued(true)
            ->setValueTransformer(ProductLabelFacetValueTransformerPlugin::class);

        $facetConfigBuilder->addFacet($productLabelFacetTransfer);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return $this
     */
    protected function addProductRatingFacet(FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $productRatingFacetTransfer = (new FacetConfigTransfer())
            ->setName(static::RATING_FACET_NAME)
            ->setParameterName(static::RATING_FACET_NAME)
            ->setFieldName(PageIndexMap::INTEGER_FACET)
            ->setType(SearchConfig::FACET_TYPE_RANGE)
            ->setValueTransformer(ProductRatingValueTransformer::class);

        $facetConfigBuilder->addFacet($productRatingFacetTransfer);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addAscendingNameSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $ascendingNameSortConfig = (new SortConfigTransfer())
            ->setName('name')
            ->setParameterName('name_asc')
            ->setFieldName(PageIndexMap::STRING_SORT);

        $sortConfigBuilder->addSort($ascendingNameSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addDescendingRatingSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $descendingRatingSortConfig = (new SortConfigTransfer())
            ->setName(static::RATING_FACET_NAME)
            ->setParameterName(static::RATING_FACET_NAME)
            ->setFieldName(PageIndexMap::INTEGER_SORT)
            ->setIsDescending(true);

        $sortConfigBuilder->addSort($descendingRatingSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addDescendingNameSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $ascendingNameSortConfig = (new SortConfigTransfer())
            ->setName('name')
            ->setParameterName('name_desc')
            ->setFieldName(PageIndexMap::STRING_SORT)
            ->setIsDescending(true);

        $sortConfigBuilder->addSort($ascendingNameSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addAscendingPriceSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $priceIdentifier = $this->getFactory()
            ->getCatalogPriceProductConnectorClient()
            ->buildPriceIdentifierForCurrentCurrency();

        $priceSortConfig = (new SortConfigTransfer())
            ->setName($priceIdentifier)
            ->setParameterName('price_asc')
            ->setFieldName(PageIndexMap::INTEGER_SORT);

        $sortConfigBuilder->addSort($priceSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addDescendingPriceSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $priceIdentifier = $this->getFactory()
            ->getCatalogPriceProductConnectorClient()
            ->buildPriceIdentifierForCurrentCurrency();

        $priceSortConfig = (new SortConfigTransfer())
            ->setName($priceIdentifier)
            ->setParameterName('price_desc')
            ->setFieldName(PageIndexMap::INTEGER_SORT)
            ->setIsDescending(true);

        $sortConfigBuilder->addSort($priceSortConfig);

        return $this;
    }
}
