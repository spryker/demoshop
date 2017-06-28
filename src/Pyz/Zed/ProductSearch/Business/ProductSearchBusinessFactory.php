<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Pyz\Zed\ProductSearch\Business\Map\Expander\ProductLabelExpander;
use Pyz\Zed\ProductSearch\Business\Map\Partial\ProductCategoryPartialPageMapBuilder;
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
        // TODO: clean up dependencies to expanders after Thomas' PR is merged
        return new ProductDataPageMapBuilder(
            $this->getProductSearchFacade(),
            $this->getProductFacade(),
            $this->getPriceFacade(),
            $this->getProductImageQueryContainer(),
            $this->createProductCategoryPartialPageMapBuilder(),
            $this->createProductPageMapExpanders()
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
     * @return \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    public function getPriceFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRICE);
    }

    /**
     * @return \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected function getProductImageQueryContainer()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::QUERY_CONTAINER_PRODUCT_IMAGE);
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Partial\ProductCategoryPartialPageMapBuilder
     */
    protected function createProductCategoryPartialPageMapBuilder()
    {
        return new ProductCategoryPartialPageMapBuilder(
            $this->getCategoryQueryContainer(),
            $this->getProductCategoryQueryContainer()
        );
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

    protected function createProductPageMapExpanders()
    {
        return [
            $this->createProductLabelExpander(),
        ];
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductLabelExpander
     */
    protected function createProductLabelExpander()
    {
        return new ProductLabelExpander($this->getProductLabelFacade());
    }

    /**
     * @return \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface
     */
    protected function getProductLabelFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRODUCT_LABEL);
    }

}
