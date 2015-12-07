<?php

namespace Pyz\Zed\Product\Communication;

use Generated\Shared\Transfer\LocaleTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Product\ProductDependencyProvider;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use SprykerFeature\Zed\Product\Communication\ProductDependencyContainer as SprykerProductDependencyContainer;
use SprykerFeature\Zed\Product\Communication\Table\ProductTable;
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

    /**
     * @return ProductTable
     */
    public function createProductTable()
    {
        $locale = $this->createLocaleFacade()->getCurrentLocale();
        $productQuery = $this->getQueryContainer()->queryAbstractProductWithLocalizedValues($locale);

        $localeTransfer = (new LocaleTransfer())->fromArray($locale->toArray());

        return $this->getFactory()->createTableProductTable(
            $productQuery,
            $this->createUrlFacade(),
            $localeTransfer,
            $this->getConfig()->getHostYves()
        );
    }
}
