<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use Pyz\Yves\Tracking\Business\TrackingConstants;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use SprykerFeature\Shared\Product\Model\AbstractProductInterface;

class ProductDataFormatter extends AbstractDataFormatter
{
    const PRODUCT = 'product';

    /**
     * @param AbstractProductInterface $product
     *
     * @return array
     */
    public static function formatProduct(AbstractProductInterface $product)
    {
        $productData = [];

        try {
            $productAttributes = $product->getAbstractAttributes();

            $currencyManager = CurrencyManager::getInstance();

            $priceAbstract = $currencyManager->convertCentToDecimal($productAttributes['valid_price']);

            $productData = [
                'id' => $product->getAbstractSku(),
                'name' => $productAttributes['abstract_name'],
                'brand' => TrackingConstants::VALUE_BRAND,
                'category' => [],
                'variants' => [],
                'price' => $priceAbstract,
            ];

            foreach ($product->getCategory() as $category) {
                $productData['category'][] = $category['name'];
            }

            foreach ($product->getConcreteProducts() as $concreteProduct) {

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
