<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use Pyz\Yves\Tracking\Business\TrackingConstants;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class SearchResultDataFormatter extends AbstractDataFormatter
{
    const PRODUCTS = 'products';

    /**
     * @param array $searchResults
     * @param array $categoryNode
     *
     * @return array
     */
    public static function formatSearchResults(array $searchResults, array $categoryNode)
    {
        $searchResultData = [];

        try {
            $currencyManager = CurrencyManager::getInstance();

//            $categoryNames = [$categoryNode['name']];
//            foreach ($categoryNode['parents'] as $parentCategory) {
//                $categoryNames[] = $parentCategory['name'];
//            }

            $position = 1;
            foreach ($searchResults['products'] as $product) {
                $searchResultData[] = [
                   'id' => $product['abstract_sku'],
                   'name' => $product['abstract_name'],
                   'brand' => TrackingConstants::VALUE_BRAND,
//                   'category' => $categoryNames,
                   'position' => $position++,
                   'price' => $currencyManager->convertCentToDecimal($product['valid_price']),
                ];
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $searchResultData;
    }

}
