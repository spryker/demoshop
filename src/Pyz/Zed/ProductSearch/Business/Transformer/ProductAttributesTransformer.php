<?php

namespace Pyz\Zed\ProductSearch\Business\Transformer;

use SprykerFeature\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformer as SprykerProductAttributesTransformer;

class ProductAttributesTransformer extends SprykerProductAttributesTransformer
{

    /**
     * @param array  $productsRaw
     * @param array  $searchableProducts
     *
     * @return array
     */
    public function buildProductAttributes(array $productsRaw, array $searchableProducts)
    {
        if (!$this->isInitialized()) {
            $this->initFieldToOperationMapping();
        }

        foreach ($productsRaw as $index => $productData) {
            if (isset($searchableProducts[$index])) {
                $productUrls = json_decode($productData['product_urls'], true);
                $productData['url'] = $productUrls[0];

                $abstractAttributes = json_decode($productData['abstract_attributes'], true);
                $abstractLocalizedAttributes = json_decode($productData['abstract_localized_attributes'], true);
                $abstractAttributes = array_merge($abstractAttributes, $abstractLocalizedAttributes);

                $concreteAttributes = json_decode('[' . $productData['concrete_attributes'] . ']', true);
                $concreteLocalizedAttributes = json_decode('[' . $productData['concrete_localized_attributes'] . ']', true);

                $concreteSkus = json_decode($productData['concrete_skus'], true);
                $concreteNames = json_decode($productData['concrete_names'], true);
                $productData['concrete_products'] = [];

                $lastSku = '';
                for ($i = 0, $l = count($concreteSkus); $i < $l; $i++) {
                    if ($lastSku === $concreteSkus[$i]) {
                        continue;
                    }
                    $encodedAttributes = $concreteAttributes[$i];
                    $encodedLocalizedAttributes = $concreteLocalizedAttributes[$i];
                    if (null === $encodedAttributes) {
                        $encodedAttributes = [];
                    }
                    if (null === $encodedLocalizedAttributes) {
                        $encodedLocalizedAttributes = [];
                    }
                    $mergedAttributes = array_merge($encodedAttributes, $encodedLocalizedAttributes);

                    $lastSku = $concreteSkus[$i];
                    $productData['concrete_products'][] = [
                        'sku' => $concreteSkus[$i],
                        'attributes' => $mergedAttributes,
                        'name' => $concreteNames[$i],
                    ];
                }

                $attributes = $this->mapProductAttributes($abstractAttributes);
                $searchableProducts[$index] = array_merge_recursive($searchableProducts[$index], $attributes);
            }
        }

        return array_filter($searchableProducts);
    }

}
