<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Pyz\Zed\ProductSearch\Business\Map\Expander\PriceExpander;
use Pyz\Zed\ProductSearch\Business\Map\Expander\ProductCategoryExpander;
use Pyz\Zed\ProductSearch\Business\Map\Expander\ProductImageExpander;
use Pyz\Zed\ProductSearch\Business\Map\Expander\ProductLabelExpander;
use Pyz\Zed\ProductSearch\Business\Map\Expander\ProductReviewExpander;
use Pyz\Zed\ProductSearch\Business\Map\ProductDataPageMapBuilder;
use Pyz\Zed\ProductSearch\ProductSearchDependencyProvider;
use Spryker\Zed\ProductSearch\Business\ProductSearchBusinessFactory as SprykerProductSearchBusinessFactory;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\ProductDataPageMapBuilder
     */
    public function createProductDataPageMapBuilder()
    {
        return new ProductDataPageMapBuilder(
            $this->getProductSearchFacade(),
            $this->getProductFacade(),
            $this->getProductPageMapExpanders()
        );
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    public function getProductSearchFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface
     */
    public function getProductFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface
     */
    public function getPriceProductFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRICE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected function getProductImageQueryContainer()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::QUERY_CONTAINER_PRODUCT_IMAGE);
    }

    /**
     * @return \Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface[]
     */
    protected function getProductPageMapExpanders()
    {
        return [
            $this->createPriceExpander(),
            $this->createProductImageExpander(),
            $this->createProductCategoryExpander(),
            $this->createProductLabelExpander(),
            $this->createProductReviewExpander(),
        ];
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface
     */
    protected function createPriceExpander()
    {
        return new PriceExpander($this->getPriceProductFacade());
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface
     */
    protected function createProductImageExpander()
    {
        return new ProductImageExpander($this->getProductImageQueryContainer());
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface
     */
    protected function createProductCategoryExpander()
    {
        return new ProductCategoryExpander(
            $this->getCategoryQueryContainer(),
            $this->getProductCategoryQueryContainer()
        );
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface
     */
    protected function createProductLabelExpander()
    {
        return new ProductLabelExpander($this->getProductLabelFacade());
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface
     */
    protected function createProductReviewExpander()
    {
        return new ProductReviewExpander();
    }

    /**
     * @return \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface
     */
    protected function getProductLabelFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRODUCT_LABEL);
    }

}
