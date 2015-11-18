<?php


namespace Pyz\Zed\ProductCategory\Business;

use Propel\Runtime\Collection\ObjectCollection;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryManager as SprykerProductCategoryManager;

class ProductCategoryManager extends SprykerProductCategoryManager implements ProductCategoryManagerInterface, SprykerBugfixInterface
{

    /** @var  ProductFacade */
    protected $productFacade;
    /** @var  ProductCategoryQueryContainerInterface */
    protected $productCategoryQueryContainer;

    /**
     * @param $idAbstractProduct
     * @return ObjectCollection[]
     */
    public function getCategoriesByAbstractProductId($idAbstractProduct)
    {
        return $this->productCategoryQueryContainer->queryProductCategoryMappingsByProductId($idAbstractProduct)->find();
    }
}
