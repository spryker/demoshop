<?php

namespace Pyz\Zed\ProductSearch\Business\Processor;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessor as CoreProductSearchProcessor;

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

        $attributes = $this->getProductAttributes($productData);

        $baseProduct['search-result-data']['image_url'] = $attributes['image_url'];
        $baseProduct['search-result-data']['thumbnail_url'] = $attributes['thumbnail_url'];

        $baseProduct['search-result-data']['price'] = $attributes['price'];
        $baseProduct['integer-sort']['price'] = $attributes['price'];

        return $baseProduct;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getProductAttributes(array $productData)
    {
        $baseAttributes = $this->getBaseProductAttributes($productData);
        $localizedAttributes = $this->getLocalizedProductAttributes($productData);

        $attributes = array_merge($baseAttributes, $localizedAttributes);

        return $attributes;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getBaseProductAttributes(array $productData)
    {
        $productAttributes = $this->getEncodedData($productData['concrete_attributes']);
        $abstractAttributes = $this->getEncodedData($productData['abstract_attributes']);

        $attributes = array_merge($abstractAttributes, $productAttributes);

        return $attributes;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getLocalizedProductAttributes(array $productData)
    {
        $productAttributes = $this->getEncodedData($productData['concrete_localized_attributes']);
        $abstractAttributes = $this->getEncodedData($productData['abstract_localized_attributes']);

        $attributes = array_merge($abstractAttributes, $productAttributes);

        return $attributes;
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
