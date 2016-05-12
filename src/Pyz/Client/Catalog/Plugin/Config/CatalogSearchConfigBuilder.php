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
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\PaginationConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SearchConfigBuilderInterface;
use Spryker\Client\Search\Plugin\Config\FacetConfigBuilder;
use Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface;
use Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface;

/**
 * @method \Spryker\Client\Catalog\CatalogFactory getFactory()
 */
class CatalogSearchConfigBuilder extends AbstractPlugin implements SearchConfigBuilderInterface
{

    const DEFAULT_ITEMS_PER_PAGE = 6;
    const VALID_ITEMS_PER_PAGE_OPTIONS = [6, 18, 36];

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder
     *
     * @return void
     */
    public function buildFacetConfig(\Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $this
            ->addCategoryFacet($facetConfigBuilder)
            ->addPriceFacet($facetConfigBuilder);
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return void
     */
    public function buildSortConfig(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $this
            ->addNameSort($sortConfigBuilder)
            ->addPriceSort($sortConfigBuilder);
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
    protected function addCategoryFacet(\Spryker\Client\Search\Dependency\Plugin\FacetConfigBuilderInterface $facetConfigBuilder)
    {
        $categoryFacet = (new FacetConfigTransfer())
            ->setName('category')
            ->setParameterName('category')
            ->setFieldName(PageIndexMap::CATEGORY_ALL_PARENTS)
            ->setType(FacetConfigBuilder::TYPE_CATEGORY);

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
        $priceFacet = (new FacetConfigTransfer())
            ->setName('price')
            ->setParameterName('price')
            ->setFieldName(PageIndexMap::INTEGER_FACET)
            ->setType(FacetConfigBuilder::TYPE_PRICE_RANGE);

        $facetConfigBuilder->addFacet($priceFacet);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addNameSort(\Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder)
    {
        $nameSortConfig = (new SortConfigTransfer())
            ->setName('name')
            ->setParameterName('name')
            ->setFieldName(PageIndexMap::STRING_SORT);

        $sortConfigBuilder->addSort($nameSortConfig);

        return $this;
    }

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\SortConfigBuilderInterface $sortConfigBuilder
     *
     * @return $this
     */
    protected function addPriceSort(SortConfigBuilderInterface $sortConfigBuilder)
    {
        $priceSortConfig = (new SortConfigTransfer())
            ->setName('price')
            ->setParameterName('price')
            ->setFieldName(PageIndexMap::INTEGER_SORT);

        $sortConfigBuilder->addSort($priceSortConfig);

        return $this;
    }

}
