<?php


namespace Pyz\Zed\Product\Component;

use ProjectA\Zed\Product\Component\ProductFacade as CoreProductFacade;
use ProjectA\Zed\ProductExporter\Component\Builder\MultipleProductsBuilderInterface;

/**
 * Class ProductFacade
 *
 * @package Pyz\Zed\Product\Component
 */
class ProductFacade extends CoreProductFacade implements MultipleProductsBuilderInterface
{
    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        $builder = $this->factory->createBuilderSimpleAttributeMergeBuilder();

        return $builder->buildProducts($productsData);
    }
}
 