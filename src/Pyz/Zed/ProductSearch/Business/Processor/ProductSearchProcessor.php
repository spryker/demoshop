<?php

namespace Pyz\Zed\ProductSearch\Business\Processor;

use Generated\Shared\Transfer\LocaleTransfer;
use SprykerFeature\Zed\ProductSearch\Business\Processor\ProductSearchProcessor as CoreProductSearchProcessor;

class ProductSearchProcessor extends CoreProductSearchProcessor
{

    /**
     * @param array $productData
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function buildBaseProduct(array $productData, LocaleTransfer $locale)
    {
        $baseProduct = parent::buildBaseProduct($productData, $locale);

        // @todo this is only a hack unless we have bundles to export product images and prices
        $productAttributes = $this->getEncodedData($productData['concrete_localized_attributes']);
        $abstractAttributes = $this->getEncodedData($productData['abstract_localized_attributes']);

        $attributes = array_merge($abstractAttributes, $productAttributes);

        $baseProduct['search-result-data']['image_url'] = $attributes['image_url'];
        $baseProduct['search-result-data']['thumbnail_url'] = $attributes['thumbnail_url'];
        // @todo price should always set
        $baseProduct['search-result-data']['price'] = (isset($attributes['price'])) ? $attributes['price'] : 0;
        $baseProduct['integer-sort']['price'] = (isset($attributes['price'])) ? $attributes['price'] : 0;

        return $baseProduct;
    }

    /**
     * @param string $data
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    private function getEncodedData($data)
    {
        $encoded = json_decode($data, true);

        if (json_last_error()) {
            // @todo because of malformed strings we cant convert to an array
            return [];
//            throw new \InvalidArgumentException(json_last_error_msg() . ': ' . $data);
        }

        return $encoded;
    }

}
