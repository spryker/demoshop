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

    const PRODUCT = 'product_detail';

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

        // TODO: Remove Hack
        $product = array_merge($product, $product['abstract_attributes']);

        $result = [
            'product' => $product,
        ];


        $result = $this->addCategoryToResult($product['category'], $result);


        $config = [
            'type' => $product['product_type'],
            'options' => []
        ];

        foreach ($product['concrete_products'] as $concrete) {

            if (in_array($product['product_type'], [
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_DYNAMIC,
                ProductDynamicConstants::PRODUCT_DYNAMIC_TYPE_BUNDLE
            ])) {

                foreach ($concrete['concrete_products_dynamic'] as $dynamic) {

                    foreach ($dynamic['groups'] as $group) {
                        if ($group['key'] === 'weight') {
                            $base = $group['value'];

                            if (!isset($config['options'][$base])) {
                                $config['options'][$base] = [
                                    'sku' => $concrete['sku'],
                                    'weight' => [
                                        'value' => $concrete['attributes']['weight'],
                                        'unit' => $concrete['attributes']['weight_unit']
                                    ],
                                    'price' => $concrete['prices']['DEFAULT']
                                ];
                            }

                            foreach ($dynamic['groups'] as $group) {
                                if ($group['key'] !== 'weight' && $group['value'] !== 'no') {
                                    $config['options'][$base][$group['key']][$group['value']] = $group['value'];
                                }
                            }

                        }
                    }
                }

            } else {

                if (count($concrete['product_group_values'])) {

                    foreach ( $concrete['product_group_values'] as $key => $base ) {
                        if ($key === 'weight') {

                            if (!isset($config['options'][$base])) {
                                $config['options'][$base] = [
                                    'sku' => $concrete['sku'],
                                    'weight' => [
                                        'value' => $concrete['attributes']['weight'],
                                        'unit' => $concrete['attributes']['weight_unit']
                                    ],
                                    'price' => $concrete['prices']['DEFAULT']
                                ];
                            }

                            foreach ( $concrete['product_group_values'] as $key => $value ) {
                                if ($key !== 'weight' && $value !== 'no') {
                                    $config['options'][$base][$key][$value] = $value;
                                }
                            }

                        }
                    }

                } else {

                    $base = $concrete['attributes']['weight'] . $concrete['attributes']['weight_unit'];

                    $config['options'][$base] = [
                        'sku' => $concrete['sku'],
                        'weight' => [
                            'value' => $concrete['attributes']['weight'],
                            'unit' => $concrete['attributes']['weight_unit']
                        ],
                        'price' => $concrete['prices']['DEFAULT']
                    ];
                }

            }
        }


        $result['config'] = $config;

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
