<?php

namespace Pyz\Zed\Product\Communication;

use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Product\ProductDependencyProvider;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use SprykerFeature\Zed\Product\Communication\ProductDependencyContainer as SprykerProductDependencyContainer;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use SprykerFeature\Zed\Product\ProductConfig;

/**
 * @method ProductQueryContainer getQueryContainer()
 * @method ProductConfig getConfig()
 */
class ProductDependencyContainer extends SprykerProductDependencyContainer
{

    /**
     * @return ProductCategoryFacade
     */
    public function getProductCategoryFacade()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::FACADE_PRODUCT_CATEGORY);
    }

    /**
     * @return CategoryFacade
     */
    public function getCategoryFacade()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::FACADE_CATEGORIES);
    }

    /**
     * @return ProductDynamicFacade
     */
    public function getProductDynamicFacade()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::FACADE_PRODUCT_DYNAMIC);
    }

}
