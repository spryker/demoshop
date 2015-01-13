<?php


namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\ProductFacade as CoreProductFacade;
use ProjectA\Zed\ProductExporter\Business\Builder\MultipleProductsBuilderInterface;
use ProjectA\Zed\ProductExporter\Business\Builder\ProductExporterToProductInterface;

/**
 * Class ProductFacade
 *
 * @package Pyz\Zed\Product\Business
 */
class ProductFacade extends CoreProductFacade implements ProductExporterToProductInterface
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
 