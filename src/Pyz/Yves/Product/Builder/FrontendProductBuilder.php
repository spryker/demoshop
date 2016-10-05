<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;

class FrontendProductBuilder implements FrontendProductBuilderInterface
{
    /**
     * @var \Pyz\Yves\Product\Model\ProductAbstract
     */
    protected $productAbstract;

    /**
     * @var \Pyz\Yves\Product\Builder\AttributeVariantBuilderInterface
     */
    protected $attributeVariantBuilder;

    /**
     * @param \Pyz\Yves\Product\Model\ProductAbstract $productAbstract
     * @param \Pyz\Yves\Product\Builder\AttributeVariantBuilderInterface $attributeVariantBuilder
     */
    public function __construct(
        ProductAbstract $productAbstract,
        AttributeVariantBuilderInterface $attributeVariantBuilder
    ) {
        $this->productAbstract = $productAbstract;
        $this->attributeVariantBuilder = $attributeVariantBuilder;
    }

    /**
     * @param array $productData
     * @param array $selectedAttributes
     *
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    public function buildProduct(array $productData, array $selectedAttributes = [])
    {
        $productAbstract = $this->createProductAbstractClone();

        $this->mergeProductData($productData, $productAbstract);
        $this->attributeVariantBuilder->buildAttributeVariants($selectedAttributes, $productAbstract);

        return $productAbstract;
    }

    /**
     * @param array $productData
     * @param ProductAbstract $productAbstract
     */
    protected function mergeProductData(array $productData, ProductAbstract $productAbstract)
    {
        foreach ($productData as $name => $value) {
            $arrayParts = explode('_', strtolower($name));
            $arrayParts = array_map('ucfirst', $arrayParts);

            $setter = 'set' . implode('', $arrayParts);

            if (method_exists($productAbstract, $setter)) {
                $productAbstract->{$setter}($value);
            } else {
                $productAbstract->addAttribute($name, $value);
            }
        }
    }

    /**
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    protected function createProductAbstractClone()
    {
        return clone $this->productAbstract;
    }

}
