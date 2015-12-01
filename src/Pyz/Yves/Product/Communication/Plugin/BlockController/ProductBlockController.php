<?php

namespace Pyz\Yves\Product\Communication\Plugin\BlockController;

use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Shared\ProductDynamic\ProductDynamicConstants;
use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use Pyz\Yves\Product\Communication\ProductDependencyContainer;
use Pyz\Yves\Tracking\Business\DataFormatter\ProductDataFormatter;
use Pyz\Yves\Tracking\Business\Tracking;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductDependencyContainer getDependencyContainer
 */
class ProductBlockController extends AbstractPlugin implements BlockControllerInterface
{

    const PRODUCT = 'product';

    /**
     * @return string
     */
    public function getTemplateType()
    {
        return self::PRODUCT;
    }

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request)
    {
        $idProduct = $pageAttributes[BlockHandler::ID_PRODUCT];
        $product = $this->getDependencyContainer()
            ->createProductClient()
            ->getAbstractProductFromStorageByIdForCurrentLocale($idProduct)
        ;

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_PRODUCT_DETAIL)
            ->setByKey(ProductDataFormatter::PRODUCT, ProductDataFormatter::formatProduct($product))
        ;

        $result = [
            'product' => $product,

            // TODO: unify options and pricings
            'pet' => 'none',
            'options' => [],
            'pricings' => [],
        ];

        $result = $this->addCategoryToResult($product['category'], $result);

        foreach ($product['concrete_products'] as $concrete) {

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
            if (in_array($product['abstract_attributes']['product_type'], [
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_DYNAMIC,
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_BUNDLE
            ])) {
                $result = $this->addDynamicProductsToResult($concrete, $weight, $result);
            } else {
                $result = $this->addSimpleProductToResult($concrete, $weight, $result);
            }
        }

        foreach ($result['options'] AS &$options) {
            foreach ($options AS &$option) {
                $option = array_unique($option);
            }
        }


        return $result;
    }

    /**
     * @param array $productCategory
     * @param array $result
     *
     * @return array
     */
    protected function addCategoryToResult(array $productCategory, array $result)
    {
        $result['category'] = count($productCategory) ? current($productCategory) : null;

        foreach ($productCategory as $category) {
            if (isset($category['category_key'])) {
                if (in_array($category['category_key'], ['dog', 'cat'])) {
                    $result['pet'] = $category['category_key'];
                    break;
                }
            }
        }

        return $result;
    }

    /**
     * @param array $concrete
     * @param int $weight
     * @param array $result
     *
     * @return array
     */
    protected function addDynamicProductsToResult(array $concrete, $weight, array $result)
    {
        $result['options'][$weight] = [];

        foreach ($concrete['concrete_products_dynamic'] AS $dynamic) {
            foreach ($dynamic['groups'] AS $group) {
                $result['options'][$weight][$group['key']][] = $group['value'];
            }
        }

        return $result;
    }

    /**
     * @param array $concrete
     * @param int $weight
     * @param array $result
     *
     * @return array
     */
    protected function addSimpleProductToResult(array $concrete, $weight, array $result)
    {
        foreach ($concrete['product_group_values'] AS $key => $value) {
            $result['options'][$weight][$key][] = $value;
        }

        return $result;
    }
}
