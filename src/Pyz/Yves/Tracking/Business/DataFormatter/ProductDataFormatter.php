<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use Pyz\Yves\Tracking\Business\TrackingConstants;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class ProductDataFormatter extends AbstractDataFormatter
{
    const PRODUCT = 'product';

    /**
     * @param array $product
     *
     * @return array
     */
    public static function formatProduct(array $product = null)
    {
        $productData = [];

        if ($product === null) {
            return $productData;
        }

        try {
            $productAttributes = $product['abstract_attributes'];

            $currencyManager = CurrencyManager::getInstance();

            $priceAbstract = $currencyManager->convertCentToDecimal($productAttributes['valid_price']);

            $productData = [
                'id' => $product['abstract_sku'],
                'name' => $productAttributes['abstract_name'],
                'brand' => TrackingConstants::VALUE_BRAND,
                'category' => [],
                'variants' => [],
                'price' => $priceAbstract,
            ];

            foreach ($product['category'] as $category) {
                $productData['category'][] = $category['name'];
            }

            foreach ($product['concrete_products'] as $concreteProduct) {

                $priceConcrete = (isset($concreteProduct['price'])) ? $concreteProduct['price'] : $priceAbstract;

                $productData['variants'][] = [
                    'id' => $concreteProduct['sku'],
                    'name' => $concreteProduct['name'],
                    'price' => $priceConcrete
                ];
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $productData;
    }

}
