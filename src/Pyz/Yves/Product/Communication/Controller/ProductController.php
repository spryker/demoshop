<?php

namespace Pyz\Yves\Product\Communication\Controller;

use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Shared\ProductDynamic\ProductDynamicConstants;
use Pyz\Yves\Tracking\Business\DataFormatter\ProductDataFormatter;
use Pyz\Yves\Tracking\Business\Tracking;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Shared\Product\Model\AbstractProductInterface;

class ProductController extends AbstractController
{

    /**
     * @param AbstractProductInterface $product
     *
     * @return array
     */
    public function detailAction(AbstractProductInterface $product)
    {
        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_PRODUCT_DETAIL)
            ->setByKey(ProductDataFormatter::PRODUCT, ProductDataFormatter::formatProduct($product))
        ;

        $result = [
            'product' => $product,
            'category' => count($product->getCategory()) ? current($product->getCategory()) : null,
            'options' => [],
            'pricings' => [],
        ];


        foreach ($product->getConcreteProducts() as $concrete) {

            $weight = $concrete['attributes']['weight'];
            $unit = $concrete['attributes']['weight_unit'];


            $result['pricings'][$weight] = [
                'weight' => $weight,
                'absolute' => $concrete['prices']['DEFAULT'],
                'relative' => $concrete['prices']['DEFAULT'] / $weight * (in_array($unit, ['ml', 'g']) ? 100 : 1),
                'unit' => $unit
            ];
            
            // AGGREGATE CONFIGURATION OPTIONS

            // dynamic / bundle
            if (in_array($product->getAbstractAttributes()['product_type'], [
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_DYNAMIC,
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_BUNDLE
            ])) {

                foreach ($concrete['concrete_products_dynamic'] AS $dynamic) {
                    foreach ($dynamic['groups'] AS $group) {
                        $result['options'][$group['key']][] = $group['value'];
                    }
                }

            // simple
            } else {

                foreach ($concrete['product_group_values'] AS $key => $value) {
                    $result['options'][$key][] = $value;
                }
            }
        }

        foreach ($result['options'] AS &$option) {
            $option = array_unique($option);
        }


        return $result;
    }

}
